<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruiterMissionController extends Controller
{
   public function create(){
    return view('recruiter.create');
   }
}
