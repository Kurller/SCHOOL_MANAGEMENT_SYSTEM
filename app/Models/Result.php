<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'student_id',
        'school_class_id',
        'subject_id',
        'term',
        'session',
        'ca_score',
        'exam_score',
        'total_score',
        'grade',
        'remark',
        'position',
    ];


    protected $casts = [
        'ca_score' => 'integer',
        'exam_score' => 'integer',
        'total_score' => 'integer',
        'position' => 'integer',
    ];


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    /**
     * Result belongs to a student
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


    /**
     * Result belongs to a school class
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }


    /**
     * Result belongs to a subject
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }


    /*
    |--------------------------------------------------------------------------
    | Grade Calculations
    |--------------------------------------------------------------------------
    */


    public static function calculateTotal($caScore, $examScore)
    {
        return ($caScore ?? 0) + ($examScore ?? 0);
    }


    public static function calculateGrade($score)
    {
        return match (true) {
            $score >= 70 => 'A',
            $score >= 60 => 'B',
            $score >= 50 => 'C',
            $score >= 45 => 'D',
            $score >= 40 => 'E',
            default      => 'F',
        };
    }


    public static function calculateRemark($score)
    {
        return match (true) {
            $score >= 70 => 'Excellent',
            $score >= 60 => 'Very Good',
            $score >= 50 => 'Good',
            $score >= 45 => 'Fair',
            $score >= 40 => 'Pass',
            default      => 'Fail',
        };
    }


    /*
    |--------------------------------------------------------------------------
    | Automatically calculate scores before saving
    |--------------------------------------------------------------------------
    */


    protected static function booted()
    {
        static::saving(function ($result) {

            $result->total_score = self::calculateTotal(
                $result->ca_score,
                $result->exam_score
            );


            $result->grade = self::calculateGrade(
                $result->total_score
            );


            $result->remark = self::calculateRemark(
                $result->total_score
            );

        });
    }
}