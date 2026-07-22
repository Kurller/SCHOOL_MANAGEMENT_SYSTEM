<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\ParentModel;
use App\Models\Result;
use App\Models\SchoolSetting;

class ParentController extends Controller
{
    /**
     * Get the logged-in parent's profile.
     */
    private function getParent()
    {
        $parent = ParentModel::where('user_id', auth()->id())->first();

        if (!$parent) {
            abort(404, 'Parent profile not found.');
        }

        return $parent;
    }

    /**
     * Display all children.
     */
    public function children()
    {
        $parent = $this->getParent();

        $students = $parent->students()
            ->with('schoolClass')
            ->get();

        return view('parent.children', compact('students'));
    }

    /**
     * Display all children's results.
     */
    public function results()
    {
        $parent = $this->getParent();

        $studentIds = $parent->students()->pluck('students.id');

        $results = Result::with([
                'student',
                'subject',
                'schoolClass'
            ])
            ->whereIn('student_id', $studentIds)
            ->latest()
            ->get();

        return view('parent.results', compact('results'));
    }

    /**
     * Display all children's fees.
     */
    public function fees()
    {
        $parent = $this->getParent();

        $studentIds = $parent->students()->pluck('students.id');

        $fees = Fee::with('student')
            ->whereIn('student_id', $studentIds)
            ->latest()
            ->get();

        return view('parent.fees', compact('fees'));
    }

    /**
     * Display a child's report card.
     */
    public function reportCard($studentId)
{
    $parent = $this->getParent();

    $student = $parent->students()
        ->with('schoolClass')
        ->where('students.id', $studentId)
        ->firstOrFail();

    // Get school settings FIRST
    $setting = SchoolSetting::first();

    if (!$setting) {
        return back()->with('error', 'School settings have not been configured.');
    }

    $results = Result::with('subject')
        ->where('student_id', $student->id)
        ->where('term', $setting->current_term)
        ->where('session', $setting->current_session)
        ->orderBy('subject_id')
        ->get();

    if ($results->isEmpty()) {
        return back()->with('error', 'No report card found for the current term and session.');
    }

    $total = $results->sum('total_score');
    $average = round($results->avg('total_score'), 2);
    $position = $results->first()->position;

    return view('parent.report-card', compact(
        'student',
        'results',
        'setting',
        'total',
        'average',
        'position'
    ));
}
}