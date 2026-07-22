<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\Result;
use App\Models\Fee;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index', [
    'students' => Student::count(),
    'teachers' => Teacher::count(),
    'classes' => SchoolClass::count(),
    'subjects' => Subject::count(),

    'present' => Attendance::where('status', 'Present')->count(),
    'absent' => Attendance::where('status', 'Absent')->count(),

    'results' => Result::count(),

    'feesCollected' => Fee::sum('amount_paid'),
    'feesExpected' => Fee::sum('amount_due'),
    'outstandingFees' => Fee::sum('balance'),
]);
    }
public function exportExcel()
{
    return Excel::download(
        new ReportsExport,
        'students.xlsx'
    );
}

public function exportPdf()
{
    $students = Student::all();

    $pdf = Pdf::loadView(
        'reports.pdf',
        compact('students')
    );

    return $pdf->download('students.pdf');
}
}