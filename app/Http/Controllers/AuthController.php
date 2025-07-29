<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Mail\VerificationCodeMail;
use App\Models\EmailOtp;

use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\Candidate;
class AuthController extends Controller
{
    public function showRegisterChoice()
    {
        return view("auth.register_choice");
    }
    public function showRegisterApplicant(){
        return view("auth.register_applicant");
    }
    public function showRegisterRecruiter(){
        return view("auth.register_recruiter");
    }
    public function applicantRegister(Request $request)
{
    $messages = [
        'first_name.required' => 'Le prénom est obligatoire',
        'last_name.required' => 'Le nom est obligatoire',
        'email.unique' => 'Cet email est déjà utilisé',
        'email.email' => 'Format email invalide',
        'cv.required' => 'Le CV est obligatoire',
        'cv.mimes' => 'Le CV doit être au format PDF, DOC ou DOCX',
        'cv.max' => 'Le CV ne doit pas dépasser 2MB',
        'biography.min' => 'La biographie doit faire au moins 20 caractères',
        'password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre',
        'password.confirmed' => 'Les mots de passe ne correspondent pas',
        'skills.min' => 'Au moins 2 compétences sont requises',
        'skills.0.required' => 'La première compétence est obligatoire',
        'skills.1.required' => 'La deuxième compétence est obligatoire',
    ];

    $validatedData = $request->validate([
        'first_name' => 'required|string|min:2|max:25',
        'last_name' => 'required|string|min:2|max:25',
        'email' => 'required|string|email|unique:users,email',
        'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'biography' => 'required|string|min:20|max:300',
        'skills' => 'required|array|min:2|max:3',
        'skills.0' => 'required|string|max:100',  
        'skills.1' => 'required|string|max:100',   
        'skills.2' => 'nullable|string|max:100',
        'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|confirmed',
        'password_confirmation' => 'required'
    ], $messages);

    $cvPath = $request->file('cv')->store('cvs', 'public');

    $user = User::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => 'candidat',
    ]);

    $randomOtp = random_int(100000, 999999);
    $otpExpiration = now()->addMinutes(120);

    $email = $user->email;
    EmailOtp::create([
        'user_id'=>$user->id,
        'otp_code'=>$randomOtp,
        'email'=>$email,
        'expires_at'=>$otpExpiration,
        'verified_at' => null,
    ]);
    Mail::to($user->email)->send(new VerificationCodeMail($randomOtp));

    $user->candidate()->create([
        'cv_path' => $cvPath,
        'bio' => $validatedData['biography'],
        'skills' => $validatedData['skills'],
    ]);

    return view('auth.verify_otp', [
        'user' => $user,
    ]);
}

    public function recruiterRegister(Request $request)
{
    $messages = [
        'first_name.required' => 'Le prénom est obligatoire',
        'last_name.required' => 'Le nom est obligatoire',
        'email.unique' => 'Cet email est déjà utilisé',
        'email.email' => 'Format email invalide',
        'company_name.required' => 'Le nom de l\'entreprise est obligatoire',
        'industry.required' => 'Le nom de l\'industrie est obligatoire',
        'industry.min' => 'Le nom de l\'industrie doit être au moins 3 caractères ',
        'industry.max' => 'Le nom de l\'industrie ne doit pas dépasser 20 caractères ',
        'password.confirmed' => 'Les mots de passe ne correspondent pas',
        'password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre',
    ];

    $validatedData = $request->validate([
        'first_name' => 'required|string|min:2|max:25',
        'last_name' => 'required|string|min:2|max:25',
        'email' => 'required|string|email|unique:users,email',
        'company_name' => 'required|string|min:3|max:20',
        'website' => 'nullable|url|max:255',
        'industry' => 'required|string|min:3|max:40',
        'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|confirmed',
        'password_confirmation' => 'required'
    ], $messages);

    $user = User::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => 'recruteur',
    ]);

    $randomOtp = random_int(100000, 999999);
    $otpExpiration = now()->addMinutes(120);
$email = $user->email;
    EmailOtp::create([
        'user_id'=>$user->id,
        'otp_code'=>$randomOtp,
        'email'=>$email,
        'expires_at'=>$otpExpiration,
        'verified_at' => null,
    ]);
    Mail::to($user->email)->send(new VerificationCodeMail($randomOtp));



    $user->recruiter()->create([
        'company_name' => $validatedData['company_name'],
        'industry' => $validatedData['industry'],
        'website' => $validatedData['website'],
    ]);

    return view('auth.verify_otp', [
        'user' => $user,
        ]);
} 
    public function VerifyOtp(Request $request){
        $request->validate([
        'otp_code' => 'required|digits:6',
        'email' => 'required|email',
    ]);

    // Recherche de l'OTP valide
    $otp = EmailOtp::where('email', $request->email)
                ->where('otp_code', $request->otp_code)
                ->whereNull('verified_at') // éviter réutilisation
                ->where('expires_at', '>', now())
                ->first();

    if (!$otp) {
        return back()->withErrors(['otp_code' => 'Code invalide ou expiré.']);
    }

    // Marquer l'OTP comme utilisé
    $otp->verified_at = now();
    $otp->save();

    // Vérifier l'email de l'utilisateur
    $user = User::where('email', $request->email)->first();
    $user->email_verified_at = now();
    $user->save();

    // Rediriger ou authentifier
    return redirect('/')->with('success', 'Email vérifié avec succès.');

        }

}
