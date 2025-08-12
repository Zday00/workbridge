<?php

namespace App\Http\Controllers;
use App\Models\Recruiter;

use App\Models\Category;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RecruiterMissionController extends Controller
{
    public function index(){
        $user = Auth::user();

        $recruiter = Recruiter::where('user_id', $user->id)->first();

        $missions = Mission::where('recruiter_id', $recruiter->id)
         ->whereNotIn('status', ['filled', 'expired']) ->get();
       
        return view('dashboard.recruiter.index', compact('missions'));

    }
    public function archived() {
                   
        $user = auth()->user();
        $recruiter = Recruiter::where('user_id', $user->id)->first();

        $missions = Mission::where('recruiter_id', $recruiter->id)
                    ->whereIn('status', ['filled', 'expired'])
                    ->get();

        return view('dashboard.recruiter.archived', compact('missions'));
    }






    public function create()
    {
        $categories = Category::all();
        return view('dashboard.recruiter.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!Auth::user() || !Auth::user()->recruiter) {
            return redirect()->route('recruiter.create')
                ->with('error', 'Vous devez avoir un profil recruteur pour créer une mission.')
                ->withInput();
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary_range' => 'required|string|max:100',
            'deadline' => 'required|date|after:today',
            'status' => 'required|in:open,closed,paused,filled,expired',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'Le titre de la mission est obligatoire.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
            'description.required' => 'La description de la mission est obligatoire.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'location.required' => 'Le lieu de la mission est obligatoire.',
            'location.string' => 'Le lieu doit être une chaîne de caractères.',
            'location.max' => 'Le lieu ne peut pas dépasser 255 caractères.',
            'salary_range.required' => 'La fourchette salariale est obligatoire.',
            'salary_range.string' => 'La fourchette salariale doit être une chaîne de caractères.',
            'salary_range.max' => 'La fourchette salariale ne peut pas dépasser 100 caractères.',
            'deadline.required' => 'La date limite est obligatoire.',
            'deadline.date' => 'La date limite doit être une date valide.',
            'deadline.after' => 'La date limite doit être postérieure à aujourd\'hui.',
            'status.required' => 'Le statut de la mission est obligatoire.',
            'status.in' => 'Le statut sélectionné n\'est pas valide.',
            'category_id.required' => 'La catégorie est obligatoire.',
            'category_id.exists' => 'La catégorie sélectionnée n\'existe pas.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('recruiter.create')
                ->withErrors($validator)
                ->withInput()
                ->with('validation_failed', true);
        }

        $validated = $validator->validated();
        $validated['recruiter_id'] = Auth::user()->recruiter->id;

        Mission::create($validated);

        return redirect()->route('recruiter.index')->with('success', 'Mission créée avec succès.');
    }

    public function destroy(Mission $mission){
        if (auth()->id() !== $mission->recruiter->user_id) {
                abort(403, "Action non autorisée");
        }
        $mission->delete();
        return redirect()->route('recruiter.index')->with('success', 'Mission supprimée avec succès.');
    }

    public function edit(Mission $mission){
        if (auth()->id() !== $mission->recruiter->user_id) {
            abort(403, "Action non autorisée");
        }
    
        return view('dashboard.recruiter.edit', compact('mission'));
    }

    public function update(Request $request, Mission $mission)
{
    if (auth()->id() !== $mission->recruiter->user_id) {
        abort(403, "Action non autorisée");
    }

    $mission->update($request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string|max:255',
        'salary_range' => 'required|string|max:100',
        'deadline' => 'required|date|after:today',
        'status' => 'required|in:open,closed,paused,filled,expired',
        'category' => 'required|in:informatique,marketing,education,sante,ingenierie,finance,art_design,droit'
    ], [
        // Messages d'erreur personnalisés
        'title.required' => 'Le titre est obligatoire.',
        'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
        'description.required' => 'La description est obligatoire.',
        'location.required' => 'Le lieu est obligatoire.',
        'location.max' => 'Le lieu ne peut pas dépasser 255 caractères.',
        'salary_range.required' => 'La fourchette salariale est obligatoire.',
        'salary_range.max' => 'La fourchette salariale ne peut pas dépasser 100 caractères.',
        'deadline.required' => 'La date limite est obligatoire.',
        'deadline.date' => 'La date limite doit être une date valide.',
        'deadline.after' => 'La date limite doit être dans le futur.',
        'status.required' => 'Le statut est obligatoire.',
        'status.in' => 'Le statut sélectionné n\'est pas valide.',
        'category.required' => 'La catégorie est obligatoire.',
        'category.in' => 'La catégorie sélectionnée n\'est pas valide.',
    ]));

    return redirect()->route('recruiter.index')
        ->with('success', 'Mission mise à jour avec succès !');
}

    public function show(Mission $mission)  {  
  
        
        if (auth()->user()->id !== $mission->recruiter->user_id) {
            abort(403, 'Accès non autorisé.');
        }

        return view('dashboard.recruiter.show', compact('mission'));
    }

    public function showCompanyInfo()
{
    $recruiter = auth()->user()->recruiter;

    if (!$recruiter) {
        abort(404, "Profil recruteur non trouvé.");
    }

    return view('dashboard.recruiter.company-info', compact('recruiter'));
}

public function editCompanyInfo()
{
    $recruiter = auth()->user()->recruiter;

    if (!$recruiter) {
        abort(404, "Profil recruteur non trouvé.");
    }

    return view('dashboard.recruiter.company-info-edit', compact('recruiter'));
}

public function updateCompanyInfo(Request $request)
{
    $validated = $request->validate([
        'company_name' => ['required', 'string', 'max:255'],
        'industry' => ['required', 'string', 'min:3', 'max:20'],
        'website' => ['nullable', 'url', 'max:255'],
    ], [
        'company_name.required' => 'Le nom de l\'entreprise est obligatoire.',
        'industry.required' => 'Le nom de l\'industrie est obligatoire.',
        'industry.min' => 'Le nom de l\'industrie doit comporter au moins 3 caractères.',
        'industry.max' => 'Le nom de l\'industrie ne doit pas dépasser 20 caractères.',
        'website.url' => 'Le format de l\'URL est invalide.',
    ]);

    $recruiter = auth()->user()->recruiter;

    if (!$recruiter) {
        abort(404, "Profil recruteur non trouvé.");
    }

    $recruiter->update($validated);

    return redirect()->route('recruiter.company.info')->with('success', 'Informations de l\'entreprise mises à jour avec succès.');
}

}
