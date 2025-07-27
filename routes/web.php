<?php

use App\Http\Controllers\AuthController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


Route::get(uri: '/', action: function () {
    return view(view: 'layouts/homepage');
});

// Séparation des routes en fonctions des rôles 

// Inscription et connexion
Route::get('/register', [AuthController::class, 'showRegisterChoice'])->name('show.register.choice');




Route::get('/register/applicant', [AuthController::class, 'showRegisterApplicant'])->name('show.register.applicant');
Route::get('/register/recruiter', [AuthController::class, 'showRegisterRecruiter'])->name('show.register.recruiter');

Route::post('/register/applicant', [AuthController::class, 'applicantRegister'])->name('register.applicant');
Route::post('/register/recruiter',[AuthController::class, 'recruiterRegister'])->name('register.recruiter');