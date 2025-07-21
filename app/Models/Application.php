<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['candidate_id', 'mission_id', 'status', 'cover_letter'];
    protected $dates = ['applied_at'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}
