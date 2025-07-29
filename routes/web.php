<?php

use App\Http\Controllers\AuthController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Mail\VerificationCodeMail;

 use Illuminate\Support\Facades\Mail;
Route::get(uri: '/', action: function () {
    return view(view: 'layouts/homepage');
});

// Séparation des routes en fonctions des rôles 

// Inscription
Route::get('/register', [AuthController::class, 'showRegisterChoice'])->name('show.register.choice');




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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');



