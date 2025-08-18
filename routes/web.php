<?php

use App\Http\Controllers\AuthController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Mail\VerificationCodeMail;
use App\Http\Controllers\RecruiterMissionController;
use App\Http\Controllers\CandidateController;

 use Illuminate\Support\Facades\Mail;
Route::get('/', function () {
    return view('layouts.homepage');  
})->name('homepage'); 


// Séparation des routes en fonctions des rôles 

// Inscription
Route::get('/register', [AuthController::class, 'showRegisterChoice'])->name('show.register.choice');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'verifyForm'])->name('verify.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register/applicant', [AuthController::class, 'showRegisterApplicant'])->name('show.register.applicant');
Route::get('/register/recruiter', [AuthController::class, 'showRegisterRecruiter'])->name('show.register.recruiter');


Route::post('/register/applicant', [AuthController::class, 'applicantRegister'])->name('register.applicant');
Route::post('/register/recruiter',[AuthController::class, 'recruiterRegister'])->name('register.recruiter');

//Formulaire du code OTP |  afficher le formulaire dans lequel l’utilisateur va saisir le code OTP
Route::get('/verify-email', [AuthController::class, 'showVerifyForm'])->name('verification.form');

//Traitement de la vérification OTP
Route::post('/verify-email', [AuthController::class, 'VerifyOtp'])->name('verification.submit');

//Renvoi de code OTP en cas d'echec
Route::get('/resend-otp', [AuthController::class, 'ResendOtp'])->name('verification.resend');

//Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');



Route::get('/menu', function () {
    return view('dashboard.layouts.app');
})->middleware('auth')->name('menu');

Route::get('/index', function () {
    return view('dashboard.layouts.app');
})->middleware('auth')->name('index');


// CRUD RECRUTEUR

Route::middleware('auth')->prefix('recruiter')->name('recruiter.')->group(function () {
    Route::get('/index', [RecruiterMissionController::class, 'index'])->name('index');
    Route::get('/create', [RecruiterMissionController::class, 'create'])->name('create');
    Route::post('/store', [RecruiterMissionController::class, 'store'])->name('store');
    Route::delete('/missions/{mission}', [RecruiterMissionController::class, 'destroy'])->name('destroy');
    Route::get('/missions/{mission}/edit', [RecruiterMissionController::class, 'edit'])->name('edit');
    Route::get('/missions/{mission}', [RecruiterMissionController::class, 'show'])->name('show');
    Route::put('missions/{mission}', [RecruiterMissionController::class, 'update'])->name('update');
    Route::get('/archived', [RecruiterMissionController::class, 'archived'])->name('archived');
    
    Route::get('/company-info', [RecruiterMissionController::class, 'showCompanyInfo'])->name('company.info');
    Route::get('/company-info/edit', [RecruiterMissionController::class, 'editCompanyInfo'])->name('company.edit');
    Route::put('/company-info', [RecruiterMissionController::class, 'updateCompanyInfo'])->name('company.update');
});

Route::middleware('auth')->prefix('candidate')->name('candidate.')->group(function () {
    // Mes offres
    Route::get('/offers', [CandidateController::class, 'index'])->name('index');
    Route::get('/offers/{mission}', [CandidateController::class, 'show'])->name('show');

    // Profil candidat
    Route::get('/profile', [CandidateController::class, 'profile'])->name('profile');
    Route::put('/profile', [CandidateController::class, 'updateProfile'])->name('profile.update');

    Route::get('/cv', [CandidateController::class, 'cv'])->name('cv');

    // Formulaire de candidature
    Route::get('/offers/{mission}/apply', [CandidateController::class, 'createApplication'])->name('apply');

    // Envoi du formulaire
    Route::post('/offers/{mission}/apply', [CandidateController::class, 'storeApplication'])->name('storeApply');









});