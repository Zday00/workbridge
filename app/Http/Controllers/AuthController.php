<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
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

    $user->candidate()->create([
        'cv_path' => $cvPath,
        'bio' => $validatedData['biography'],
        'skills' => $validatedData['skills'],
    ]);

    return view('welcome', [
        'user' => $user,
        'message' => 'Votre compte candidat a été créé avec succès !'
    ]);
}





}
