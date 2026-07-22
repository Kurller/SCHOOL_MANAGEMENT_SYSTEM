<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use App\Models\Result;
use App\Models\Fee;

class ParentDashboardController extends Controller
{
    public function index()
    {
        $parent = ParentModel::where('user_id', auth()->id())->firstOrFail();

        $students = $parent->students()
            ->with('schoolClass')
            ->get();

        $studentIds = $students->pluck('id');

        $results = Result::with(['student', 'subject'])
            ->whereIn('student_id', $studentIds)
            ->latest()
            ->take(5)
            ->get();

        $fees = Fee::with('student')
            ->whereIn('student_id', $studentIds)
            ->latest()
            ->get();

        return view('parent.dashboard', compact(
            'parent',
            'students',
            'results',
            'fees'
        ));
    }
}