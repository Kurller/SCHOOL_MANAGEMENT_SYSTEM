<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        $results = $student->results()
            ->with(['subject', 'schoolClass'])
            ->get();

        return view('student.results.index', compact('results'));
    }
}