<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $class = $request->class;
        $date = $request->date;

        $attendances = Attendance::with(['student', 'schoolClass'])

            ->when($search, function ($query) use ($search) {
                $query->whereHas('student', function ($q) use ($search) {
                    $q->where('student_id', 'like', "%{$search}%")
                      ->orWhere('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%");
                });
            })

            ->when($class, function ($query) use ($class) {
                $query->where('school_class_id', $class);
            })

            ->when($date, function ($query) use ($date) {
                $query->whereDate('attendance_date', $date);
            })

            ->latest()
            ->paginate(10);

        $classes = SchoolClass::all();

        return view('attendances.index', compact(
            'attendances',
            'classes',
            'search',
            'class',
            'date'
        ));
    }

    public function create()
    {
        return view('attendances.create', [
            'students' => Student::orderBy('first_name')->get(),
            'classes' => SchoolClass::where('status', 'Active')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:Present,Absent,Late,Excused',
            'remarks' => 'nullable|string',
        ]);

        Attendance::create($validated);

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance recorded successfully.');
    }

    public function edit(Attendance $attendance)
    {
        return view('attendances.edit', [
            'attendance' => $attendance,
            'students' => Student::orderBy('first_name')->get(),
            'classes' => SchoolClass::where('status', 'Active')->get(),
        ]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:Present,Absent,Late,Excused',
            'remarks' => 'nullable|string',
        ]);

        $attendance->update($validated);

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance deleted successfully.');
    }
}