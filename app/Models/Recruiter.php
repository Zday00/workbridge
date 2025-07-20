<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    protected $fillable = ['user_id', 'company_name', 'industry', 'website'];
}
