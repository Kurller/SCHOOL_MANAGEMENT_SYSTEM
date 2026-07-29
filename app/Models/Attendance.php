<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'student_id',
        'school_class_id',
        'attendance_date',
        'status',
        'remarks',
    ];

    protected $casts = [
        'attendance_date' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Attendance belongs to a student.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Attendance belongs to a school class.
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Check if student was present.
     */
    public function isPresent()
    {
        return $this->status === 'Present';
    }

    /**
     * Check if student was absent.
     */
    public function isAbsent()
    {
        return $this->status === 'Absent';
    }

    /**
     * Check if student was late.
     */
    public function isLate()
    {
        return $this->status === 'Late';
    }
}