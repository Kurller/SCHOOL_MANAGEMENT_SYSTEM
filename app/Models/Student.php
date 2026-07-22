<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'student_id',
        'admission_number',
        'first_name',
        'last_name',
        'date_of_birth',
        'admission_date',
        'gender',
        'phone',
        'email',
        'address',
        'guardian_name',
        'guardian_phone',
        'photo',
        'status',
        'school_class_id',
    ];


    /**
     * Student belongs to a user account
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Student can have many parents/guardians
     */
    public function parents()
    {
        return $this->belongsToMany(
            ParentModel::class,
            'parent_student',
            'student_id',
            'parent_id'
        );
    }


    /**
     * Student belongs to one class
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }


    /**
     * Student attendance records
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }


    /**
     * Student examination results
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }


    /**
     * Student fee records
     */
    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}