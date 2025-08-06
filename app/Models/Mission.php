<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
protected $fillable = [
    'recruiter_id',
    'category_id',
    'title',
    'description',
    'location',
    'salary_range',
    'deadline',
    'status',
];

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function acceptedApplication()
    {
        return $this->hasOne(Application::class)->where('status', 'accepted');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
