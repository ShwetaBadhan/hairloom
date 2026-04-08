<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'fname',
        'lname', 
        'email',
        'phone',
        'message',
        'ip_address',
        'user_agent'
    ];
}