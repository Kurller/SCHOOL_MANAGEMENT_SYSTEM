<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'class_name',
        'class_code',
        'level',
        'description',
        'status',
    ];


    /**
     * School class has many students
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'school_class_id');
    }


    /**
     * School class has many assigned subjects
     */
    public function classSubjects()
    {
        return $this->hasMany(ClassSubject::class, 'school_class_id');
    }


    /**
     * School class has many results
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'school_class_id');
    }


    /**
     * School class has many fee records
     */
    public function fees()
    {
        return $this->hasMany(Fee::class, 'school_class_id');
    }
}