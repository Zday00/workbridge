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

        $missions = Mission::where('recruiter_id', $recruiter->id)->get();

        return view('dashboard.recruiter.index', compact('missions'));

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
            return redirect()->route('recruiter.index')
                ->withErrors($validator)
                ->withInput()
                ->with('validation_failed', true);
        }

        $validated = $validator->validated();
        $validated['recruiter_id'] = Auth::user()->recruiter->id;

        Mission::create($validated);

        return redirect()->route('recruiter.index')->with('success', 'Mission créée avec succès.');
    }
}
