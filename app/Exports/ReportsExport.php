<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport implements FromCollection
{
    public function collection()
    {
        return Student::select(
            'student_id',
            'first_name',
            'last_name',
            'gender'
        )->get();
    }
}