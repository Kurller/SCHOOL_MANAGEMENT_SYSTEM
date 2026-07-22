<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function index()
    {
        $assignments = ClassSubject::with([
            'schoolClass',
            'subject',
            'teacher'
        ])->latest()->paginate(10);

        return view('class-subjects.index', compact('assignments'));
    }

    public function create()
    {
        return view('class-subjects.create', [
            'classes' => SchoolClass::where('status', 'Active')->get(),
            'subjects' => Subject::where('status', 'Active')->get(),
            'teachers' => Teacher::where('status', 'Active')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_class_id' => 'required|exists:school_classes,id',
            'subject_id'      => 'required|exists:subjects,id',
            'teacher_id'      => 'required|exists:teachers,id',
        ]);

        ClassSubject::create($validated);

        return redirect()
            ->route('class-subjects.index')
            ->with('success', 'Assignment created successfully.');
    }

    public function edit(ClassSubject $classSubject)
    {
        return view('class-subjects.edit', [
            'assignment' => $classSubject,
            'classes' => SchoolClass::all(),
            'subjects' => Subject::all(),
            'teachers' => Teacher::all(),
        ]);
    }

    public function update(Request $request, ClassSubject $classSubject)
    {
        $validated = $request->validate([
            'school_class_id' => 'required|exists:school_classes,id',
            'subject_id'      => 'required|exists:subjects,id',
            'teacher_id'      => 'required|exists:teachers,id',
        ]);

        $classSubject->update($validated);

        return redirect()
            ->route('class-subjects.index')
            ->with('success', 'Assignment updated successfully.');
    }

    public function destroy(ClassSubject $classSubject)
    {
        $classSubject->delete();

        return redirect()
            ->route('class-subjects.index')
            ->with('success', 'Assignment deleted successfully.');
    }
}