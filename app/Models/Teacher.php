<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'teacher_id',
        'staff_number',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'address',
        'qualification',
        'specialization',
        'employment_date',
        'salary',
        'photo',
        'status',
    ];


    /**
     * Teacher belongs to a user account
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Teacher teaches many class subjects
     */
    public function classSubjects()
    {
        return $this->hasMany(ClassSubject::class, 'teacher_id');
    }
}