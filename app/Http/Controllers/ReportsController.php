<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\Attendance;
use App\Models\Fee;
use App\Models\Result;

class ReportsController extends Controller
{
    public function index()
{
    $students = Student::count();
    $teachers = Teacher::count();
    $classes = SchoolClass::count();
    $subjects = Subject::count();

    $feesCollected = Fee::where('status', 'Paid')->sum('amount');
    $outstandingFees = Fee::where('status', 'Pending')->sum('amount');

    $present = Attendance::where('status', 'Present')->count();
    $absent = Attendance::where('status', 'Absent')->count();

    // Student registration by month
    $studentMonths = Student::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Fee collection by month
    $feeMonths = Fee::selectRaw('MONTH(payment_date) as month, SUM(amount) as total')
        ->where('status', 'Paid')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    return view('reports.index', compact(
        'students',
        'teachers',
        'classes',
        'subjects',
        'feesCollected',
        'outstandingFees',
        'present',
        'absent',
        'studentMonths',
        'feeMonths'
    ));
}
}