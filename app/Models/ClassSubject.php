<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $fillable = [
        'school_class_id',
        'subject_id',
        'teacher_id',
    ];


    /**
     * ClassSubject belongs to a school class
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }


    /**
     * ClassSubject belongs to a subject
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }


    /**
     * ClassSubject belongs to a teacher
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}