<?php

namespace App\Services;

use App\Models\Student;

class StudentTool
{

    public function search($name)
    {

        return Student::with([
            'parent',
            'classRoom'
        ])
        ->where('first_name', 'LIKE', "%{$name}%")
        ->orWhere('last_name', 'LIKE', "%{$name}%")
        ->first();

    }


    public function count()
    {

        return Student::count();

    }


    public function all()
    {

        return Student::select(
            'id',
            'first_name',
            'last_name',
            'admission_number'
        )
        ->get();

    }

}