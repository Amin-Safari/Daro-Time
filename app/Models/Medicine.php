<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dosage',
        'reminder_type',
        'frequency',
        'start_date',
        'start_time',
        'user_id',
        'remaining_dose',
        'last_reminder'
    ];
}
