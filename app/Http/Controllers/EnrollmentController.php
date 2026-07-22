<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $enrollments = Enrollment::with(['student', 'schoolClass'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('student', function ($q) use ($search) {
                    $q->where('student_id', 'like', "%{$search}%")
                      ->orWhere('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('enrollments.index', compact('enrollments', 'search'));
    }

    public function create()
    {
        return view('enrollments.create', [
            'students' => Student::orderBy('first_name')->get(),
            'classes' => SchoolClass::where('status', 'Active')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'        => 'required|exists:students,id',
            'school_class_id'   => 'required|exists:school_classes,id',
            'academic_session'  => 'required|max:20',
            'status'            => 'required|in:Active,Graduated,Transferred,Suspended',
        ]);

        Enrollment::create($validated);

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Student enrolled successfully.');
    }

    public function edit(Enrollment $enrollment)
    {
        return view('enrollments.edit', [
            'enrollment' => $enrollment,
            'students' => Student::orderBy('first_name')->get(),
            'classes' => SchoolClass::where('status', 'Active')->get(),
        ]);
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'student_id'        => 'required|exists:students,id',
            'school_class_id'   => 'required|exists:school_classes,id',
            'academic_session'  => 'required|max:20',
            'status'            => 'required|in:Active,Graduated,Transferred,Suspended',
        ]);

        $enrollment->update($validated);

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Enrollment deleted successfully.');
    }
}