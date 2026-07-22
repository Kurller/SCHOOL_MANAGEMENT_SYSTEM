<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    protected $fillable = [
        'school_name',
        'motto',
        'address',
        'phone',
        'email',
        'website',
        'principal',
        'current_session',
        'current_term',
        'logo',
        'principal_signature',
        'school_stamp',
    ];
}