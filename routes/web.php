<?php

use App\Http\Controllers\AuthController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


Route::get(uri: '/', action: function () {
    return view(view: 'welcome');
});

// Séparation des routes en fonctions des rôles 

// Inscription et connexion pour postulant
Route::get('/register/applicant', [AuthController::class, 'showApplicantRegister'])->name('show.applicant.register');
Route::get('/login/applicant', [AuthController::class, 'showApplicantLogin'])->name('show.applicant.login');

// Inscription et connexion pour recruteur
Route::get('/register/recruiter', [AuthController::class, 'showRecruiterRegister'])->name('show.recruiter.register');
Route::get('/login/recruiter', [AuthController::class, 'showRecruiterLogin'])->name('show.recruiter.login');

// Traitement inscription du postulant
Route::post('/register/applicant', [AuthController::class, 'applicantRegister'])->name('applicant.register');

// Traitement inscription du recruteur
Route::post('/register/recruiter', [AuthController::class, 'recruiterRegister'])->name('recruiter.register');

// Traitement connexion du postulant
Route::post('/login/applicant', [AuthController::class, 'applicantLogin'])->name('applicant.login');

// Traitement connexion du recruteur
Route::post('/login/recruiter', [AuthController::class, 'recruiterLogin'])->name('recruiter.login');











Route::post('/login', [AuthController::class], 'login')->name('login');
