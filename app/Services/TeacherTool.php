<?php

namespace App\Services;

use App\Models\Teacher;

class TeacherTool
{
    public function count()
    {
        return Teacher::count();
    }

    public function all()
    {
        return Teacher::select(
            'id',
            'first_name',
            'last_name',
            'email'
        )->get();
    }

    public function search($name)
    {
        return Teacher::where('first_name', 'like', "%{$name}%")
            ->orWhere('last_name', 'like', "%{$name}%")
            ->first();
    }
}