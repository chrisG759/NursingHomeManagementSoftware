<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
    protected $fillable = [
        'name',
        'date_of_registration'
    ];
}
