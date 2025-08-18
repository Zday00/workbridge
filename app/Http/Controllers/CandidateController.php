<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Mission;
class CandidateController extends Controller
{
    public function index()
    {
        // Récupérer toutes les missions ouvertes de tous les recruteurs
        $missions = Mission::with(['recruiter', 'category'])
            ->where('status', 'open')
            ->where('deadline', '>', now())
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('dashboard.candidate.index', compact('missions'));
    }
    public function profile()
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté
        $candidate = Candidate::where('user_id', $user->id)->first(); // Récupère ses infos dans candidates

        return view('dashboard.candidate.profile', compact('user', 'candidate'));
    }

    public function updateProfile(Request $request)
{
    $user = Auth::user();
    $candidate = Candidate::firstOrCreate(['user_id' => $user->id]);

    // Validation
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'bio' => 'nullable|string|max:1000',
        'skills.*' => 'nullable|string|max:100',
        'cv_file' => 'nullable|file|mimes:pdf|max:5120', // max 5MB
    ]);

    // Mettre à jour user
    $user->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
    ]);

    // Mettre à jour candidate
    $candidate->bio = $request->bio;
    $candidate->skills = $request->has('skills') ? json_encode($request->skills) : null;

    // Gestion du CV
    if ($request->hasFile('cv_file')) {
        $path = $request->file('cv_file')->store('cvs', 'public');
        $candidate->cv_path = $path;
    }

    $candidate->save();

    return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
}
    public function cv()
    {
        return view('dashboard.candidate.cv');
    }

    public function show(Mission $mission){

         return view('dashboard.candidate.show', compact('mission'));
    }

public function createApplication(Mission $mission)
{
    $candidate = Candidate::where('user_id', auth()->id())->first();

    // Vérifier si le candidat a déjà postulé
    $alreadyApplied = Application::where('candidate_id', $candidate->id)
        ->where('mission_id', $mission->id)
        ->exists();

    if ($alreadyApplied) {
        return redirect()->route('candidate.index')
            ->with('error', 'Vous avez déjà postulé à cette mission.');
    }

    return view('dashboard.candidate.create', compact('mission'));
}

public function storeApplication(Request $request, Mission $mission)
{
    $request->validate([
        'cover_letter' => 'required|string|min:50',
    ]);

    $candidate = Candidate::where('user_id', auth()->id())->first();

    if (!$candidate) {
        return redirect()->back()->with('error', 'Profil candidat introuvable.');
    }

    // Vérifier si une candidature existe déjà
    if (Application::where('candidate_id', $candidate->id)
        ->where('mission_id', $mission->id)
        ->exists()) {
        return redirect()->back()->with('error', 'Vous avez déjà postulé à cette mission.');
    }

    Application::create([
        'candidate_id' => $candidate->id,
        'mission_id'   => $mission->id,
        'cover_letter' => $request->cover_letter,
        'status'       => 'pending',
    ]);

    return redirect()->route('candidate.index')
        ->with('success', 'Votre candidature a été envoyée avec succès !');
}













}
