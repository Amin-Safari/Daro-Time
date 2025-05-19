<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dosage',
        'remaining_dose',
        'frequency',
        'start_date',
        'start_time',
        'last_reminder',
        'reminder_type'
    ];

    protected $casts = [
        'start_date' => 'date',
        'last_reminder' => 'datetime'
    ];
}
