<?php

namespace App\Services;

use App\Models\Student;

class ResultTool
{
    public function reportCard($studentName)
    {
        return Student::with([
            'results.subject',
            'results.schoolClass'
        ])
        ->where('first_name', 'LIKE', "%{$studentName}%")
        ->orWhere('last_name', 'LIKE', "%{$studentName}%")
        ->first();
    }
}