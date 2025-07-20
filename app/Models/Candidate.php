<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['cv_path', 'user_id', 'bio', 'skills'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
