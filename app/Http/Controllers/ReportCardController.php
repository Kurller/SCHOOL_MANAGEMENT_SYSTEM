<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\SchoolSetting;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportCardController extends Controller
{
    public function index()
    {
        $students = Student::where('status', 'Active')
            ->orderBy('first_name')
            ->get();

        $school = SchoolSetting::first();

        return view('report-cards.index', compact(
            'students',
            'school'
        ));
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);

        $school = SchoolSetting::first();

        return redirect()->route('report-cards.show', [
            'id' => $validated['student_id'],
            'term' => $school->current_term,
            'session' => $school->current_session,
        ]);
    }

    public function show(Request $request, $id)
    {
        $student = Student::with('schoolClass')->findOrFail($id);

        $school = SchoolSetting::first();

        $results = Result::with('subject')
            ->where('student_id', $id)
            ->where('term', $school->current_term)
            ->where('session', $school->current_session)
            ->orderBy('subject_id')
            ->get();

        if ($results->isEmpty()) {
            return redirect()
                ->route('report-cards.index')
                ->with(
                    'error',
                    'No results found for this student in the current term.'
                );
        }

        $total = $results->sum('total_score');
        $average = round($results->avg('total_score'), 2);
        $position = $results->first()->position;

        return view('report-cards.show', compact(
            'student',
            'results',
            'school',
            'total',
            'average',
            'position'
        ));
    }
}