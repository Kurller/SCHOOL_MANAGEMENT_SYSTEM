<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::when($search, function ($query, $search) {
            $query->where('student_id', 'like', "%{$search}%")
                ->orWhere('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

        return view('students.index', compact('students', 'search'));
    }

    /**
     * Show the student creation form.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a new student.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'       => 'required|unique:students,student_id',
            'admission_number' => 'nullable|unique:students,admission_number',
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'date_of_birth'    => 'required|date',
            'admission_date'   => 'nullable|date',
            'gender'           => 'required|in:Male,Female',
            'phone'            => 'nullable|string|max:20',
            'email'            => 'nullable|email|unique:students,email',
            'address'          => 'nullable|string',
            'guardian_name'    => 'nullable|string|max:255',
            'guardian_phone'   => 'nullable|string|max:20',
            'status'           => 'nullable|in:Active,Inactive',
            'photo'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Default status
        $validated['status'] = $validated['status'] ?? 'Active';

        // Upload photo
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student added successfully.');
    }

    /**
     * Display a single student.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the edit form.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update a student.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_id'       => 'required|unique:students,student_id,' . $student->id,
            'admission_number' => 'nullable|unique:students,admission_number,' . $student->id,
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'date_of_birth'    => 'required|date',
            'admission_date'   => 'nullable|date',
            'gender'           => 'required|in:Male,Female',
            'phone'            => 'nullable|string|max:20',
            'email'            => 'nullable|email|unique:students,email,' . $student->id,
            'address'          => 'nullable|string',
            'guardian_name'    => 'nullable|string|max:255',
            'guardian_phone'   => 'nullable|string|max:20',
            'status'           => 'nullable|in:Active,Inactive',
            'photo'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Keep existing status if not submitted
        $validated['status'] = $validated['status'] ?? $student->status;

        // Replace photo if a new one is uploaded
        if ($request->hasFile('photo')) {

            if ($student->photo && Storage::disk('public')->exists($student->photo)) {
                Storage::disk('public')->delete($student->photo);
            }

            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Delete a student.
     */
    public function destroy(Student $student)
    {
        if ($student->photo && Storage::disk('public')->exists($student->photo)) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}