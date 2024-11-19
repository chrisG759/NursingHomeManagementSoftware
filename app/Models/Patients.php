<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'admission_date',
        'phoneNumber',
        'date_of_birth',
        'emergency_contact',
        'emergency_contact_relation'
    ];
}
