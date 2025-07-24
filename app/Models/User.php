<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'role'];

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function recruiter()
    {
        return $this->hasOne(Recruiter::class);
    }

    public function conversationsSent()
    {
        return $this->hasMany(Conversation::class, 'sender_id');
    }

    public function conversationsReceived()
    {
        return $this->hasMany(Conversation::class, 'receiver_id');
    }

    public function emailOtps()
    {
        return $this->hasMany(emailOtp::class);
    }
}
