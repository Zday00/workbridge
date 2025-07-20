<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['cv_path', 'user_id', 'bio', 'skills'];
}
