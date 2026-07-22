<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $teachers = Teacher::when($search, function ($query, $search) {
            $query->where('teacher_id', 'like', "%{$search}%")
                ->orWhere('staff_number', 'like', "%{$search}%")
                ->orWhere('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

        return view('teachers.index', compact('teachers', 'search'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id'       => 'required|unique:teachers',
            'staff_number'     => 'nullable|unique:teachers',
            'first_name'       => 'required|max:255',
            'last_name'        => 'required|max:255',
            'date_of_birth'    => 'required|date',
            'gender'           => 'required|in:Male,Female',
            'phone'            => 'nullable|max:20',
            'email'            => 'nullable|email|unique:teachers',
            'address'          => 'nullable',
            'qualification'    => 'nullable|max:255',
            'specialization'   => 'nullable|max:255',
            'employment_date'  => 'required|date',
            'salary'           =>  'required|numeric',
            'status'           => 'nullable|in:Active,Inactive',
            'photo'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['status'] = $validated['status'] ?? 'Active';

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        Teacher::create($validated);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher added successfully.');
    }

   public function show(Teacher $teacher)
  {
    return view('teachers.show', compact('teacher'));
  }
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'teacher_id'      => 'required|unique:teachers,teacher_id,' . $teacher->id,
            'staff_number'    => 'nullable|unique:teachers,staff_number,' . $teacher->id,
            'first_name'      => 'required|max:255',
            'last_name'       => 'required|max:255',
            'date_of_birth'   => 'nullable|date',
            'gender'          => 'required|in:Male,Female',
            'phone'           => 'nullable|max:20',
            'email'           => 'nullable|email|unique:teachers,email,' . $teacher->id,
            'address'         => 'nullable',
            'qualification'   => 'nullable|max:255',
            'specialization'  => 'nullable|max:255',
            'employment_date' => 'nullable|date',
            'salary'          => 'nullable|numeric',
            'status'          => 'nullable|in:Active,Inactive',
            'photo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['status'] = $validated['status'] ?? 'Active';

        if ($request->hasFile('photo')) {

            if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
                Storage::disk('public')->delete($teacher->photo);
            }

            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $teacher->update($validated);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
            Storage::disk('public')->delete($teacher->photo);
        }

        $teacher->delete();

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}