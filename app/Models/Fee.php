<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [

        'student_id',
        'school_class_id',
        'term',
        'session',
        'amount_due',
        'amount_paid',
        'balance',
        'payment_date',
        'payment_method',
        'receipt_number',
        'status'

    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }
}