<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;

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
















}
