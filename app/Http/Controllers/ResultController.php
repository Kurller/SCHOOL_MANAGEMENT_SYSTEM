<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
       $setting = SchoolSetting::first();

$query = Result::with([
    'student',
    'schoolClass',
    'subject'
]);

if ($setting) {
    $query->where('term', $setting->current_term)
          ->where('session', $setting->current_session);
}


        if (auth()->user()->role->name === 'Teacher') {

            $teacher = $this->getTeacher();

            $assignments = $teacher->classSubjects;


            $query->where(function ($q) use ($assignments) {

                foreach ($assignments as $assignment) {

                    $q->orWhere(function ($sub) use ($assignment) {

                        $sub->where(
                            'school_class_id',
                            $assignment->school_class_id
                        )
                        ->where(
                            'subject_id',
                            $assignment->subject_id
                        );

                    });

                }

            });

        }


        $results = $query
            ->latest()
            ->paginate(10);


        return view('results.index', compact('results'));
    }



    public function create()
    {
        $students = Student::where('status', 'Active')->get();

        $classes = SchoolClass::where('status', 'Active')->get();

        $subjects = Subject::where('status', 'Active')->get();


        if (auth()->user()->role->name === 'Teacher') {

            $teacher = $this->getTeacher();

            $classSubjects = $teacher->classSubjects;


            $classes = SchoolClass::whereIn(
                'id',
                $classSubjects->pluck('school_class_id')
            )->get();


            $subjects = Subject::whereIn(
                'id',
                $classSubjects->pluck('subject_id')
            )->get();

        }


        return view('results.create', compact(
            'students',
            'classes',
            'subjects'
        ));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([

            'student_id'      => 'required|exists:students,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'subject_id'      => 'required|exists:subjects,id',
            'term'            => 'required|string',
            'session'         => 'required|string',
            'ca_score'        => 'required|numeric|min:0|max:40',
            'exam_score'      => 'required|numeric|min:0|max:60',

        ]);


        $this->checkTeacherPermission(
            $validated['school_class_id'],
            $validated['subject_id']
        );


        $exists = Result::where('student_id', $validated['student_id'])
            ->where('subject_id', $validated['subject_id'])
            ->where('school_class_id', $validated['school_class_id'])
            ->where('term', $validated['term'])
            ->where('session', $validated['session'])
            ->exists();


        if ($exists) {

            return back()
                ->withInput()
                ->withErrors([
                    'student_id' => 'This result has already been entered.'
                ]);

        }


        Result::create($validated);


        $this->calculatePositions(
            $validated['school_class_id'],
            $validated['term'],
            $validated['session']
        );


        return redirect()
            ->route('results.index')
            ->with('success', 'Result added successfully.');
    }



    public function show(Result $result)
    {
        $this->checkTeacherPermission(
            $result->school_class_id,
            $result->subject_id
        );


        $result->load([
            'student',
            'schoolClass',
            'subject'
        ]);


        return view('results.show', compact('result'));
    }



    public function edit(Result $result)
    {
        $this->checkTeacherPermission(
            $result->school_class_id,
            $result->subject_id
        );


        return view('results.edit', [

            'result'   => $result,

            'students' => Student::orderBy('first_name')->get(),

            'subjects' => Subject::orderBy('subject_name')->get(),

            'classes'  => SchoolClass::orderBy('class_name')->get(),

        ]);
    }



    public function update(Request $request, Result $result)
    {
        $validated = $request->validate([

            'student_id'      => 'required|exists:students,id',

            'school_class_id' => 'required|exists:school_classes,id',

            'subject_id'      => 'required|exists:subjects,id',

            'term'            => 'required|string',

            'session'         => 'required|string',

            'ca_score'        => 'required|numeric|min:0|max:40',

            'exam_score'      => 'required|numeric|min:0|max:60',

        ]);


        $this->checkTeacherPermission(
            $validated['school_class_id'],
            $validated['subject_id']
        );


        $exists = Result::where('student_id', $validated['student_id'])
            ->where('subject_id', $validated['subject_id'])
            ->where('school_class_id', $validated['school_class_id'])
            ->where('term', $validated['term'])
            ->where('session', $validated['session'])
            ->where('id', '!=', $result->id)
            ->exists();


        if ($exists) {

            return back()
                ->withInput()
                ->withErrors([
                    'student_id' => 'This result already exists.'
                ]);

        }


        $result->update($validated);


        $this->calculatePositions(
            $validated['school_class_id'],
            $validated['term'],
            $validated['session']
        );


        return redirect()
            ->route('results.index')
            ->with('success', 'Result updated successfully.');
    }



    public function destroy(Result $result)
    {
        $this->checkTeacherPermission(
            $result->school_class_id,
            $result->subject_id
        );


        $classId = $result->school_class_id;

        $term = $result->term;

        $session = $result->session;


        $result->delete();


        $this->calculatePositions(
            $classId,
            $term,
            $session
        );


        return redirect()
            ->route('results.index')
            ->with('success', 'Result deleted successfully.');
    }



    private function checkTeacherPermission($classId, $subjectId)
    {
        if (auth()->user()->role->name === 'Teacher') {


            $allowed = $this->getTeacher()
                ->classSubjects()
                ->where('school_class_id', $classId)
                ->where('subject_id', $subjectId)
                ->exists();


            if (!$allowed) {

                abort(
                    403,
                    'You are not assigned to this class and subject.'
                );

            }

        }
    }



    private function getTeacher()
    {
        $teacher = Teacher::where(
            'user_id',
            auth()->id()
        )->first();


        if (!$teacher) {

            abort(
                403,
                'Teacher profile not found.'
            );

        }


        return $teacher;
    }



    private function calculatePositions($classId, $term, $session)
    {
        $students = Result::selectRaw(
                'student_id, SUM(total_score) as total'
            )
            ->where('school_class_id', $classId)
            ->where('term', $term)
            ->where('session', $session)
            ->groupBy('student_id')
            ->orderByDesc('total')
            ->get();


        $position = 1;


        foreach ($students as $student) {

            Result::where('student_id', $student->student_id)
                ->where('school_class_id', $classId)
                ->where('term', $term)
                ->where('session', $session)
                ->update([
                    'position' => $position
                ]);


            $position++;

        }
    }



    private function ordinal($number)
    {
        if (!in_array($number % 100, [11, 12, 13])) {

            switch ($number % 10) {

                case 1:
                    return $number . 'st';

                case 2:
                    return $number . 'nd';

                case 3:
                    return $number . 'rd';

            }

        }


        return $number . 'th';
    }
}