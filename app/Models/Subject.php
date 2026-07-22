<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subject_name',
        'subject_code',
        'description',
        'status',
    ];


    /**
     * Subject has many class assignments
     */
    public function classSubjects()
    {
        return $this->hasMany(ClassSubject::class, 'subject_id');
    }


    /**
     * Subject has many student results
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'subject_id');
    }
}