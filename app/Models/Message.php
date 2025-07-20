<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['conversation_id', 'content', 'user_id'];
    protected $dates = ['read_at', 'created_at', 'updated_at'];
}
