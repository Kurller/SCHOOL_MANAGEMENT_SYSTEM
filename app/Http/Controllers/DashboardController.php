<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\SchoolClass;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function index()
{
    return view('dashboard', [

        // Basic counts
        'students' => Student::count(),
        'teachers' => Teacher::count(),
        'classes' => SchoolClass::count(),
        'subjects' => Subject::count(),

        // Attendance
        'present' => \App\Models\Attendance::where('status', 'Present')->count(),

        'absent' => \App\Models\Attendance::where('status', 'Absent')->count(),

        // Fees
        'feesCollected' => \App\Models\Fee::sum('amount_paid'),

        'feesExpected' => \App\Models\Fee::sum('amount_due'),

        'outstandingFees' => \App\Models\Fee::sum('balance'),

        // Recent Data
        'recentStudents' => Student::latest()->take(5)->get(),

        'recentResults' => \App\Models\Result::latest()->take(5)->get(),

        'recentPayments' => \App\Models\Fee::latest()->take(5)->get(),

    ]);
}
}