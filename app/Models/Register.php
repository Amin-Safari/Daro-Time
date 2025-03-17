<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'password_reset_tokens';
    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];

}
