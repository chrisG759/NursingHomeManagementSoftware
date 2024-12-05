<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'family_code',
        'family_id',
        'name',
        'doctor_name',
        'appointment_time',
        'caregiver_name',
        'morning_medicine',
        'afternoon_medicine',
        'night_medicine',
        'breakfast',
        'lunch',
        'dinner',
    ];
}
