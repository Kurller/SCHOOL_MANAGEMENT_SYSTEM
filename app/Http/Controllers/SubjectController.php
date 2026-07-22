<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $subjects = Subject::when($search, function ($query, $search) {
            $query->where('subject_name', 'like', "%{$search}%")
                  ->orWhere('subject_code', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

        return view('subjects.index', compact('subjects', 'search'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_name' => 'required|max:255',
            'subject_code' => 'required|max:50|unique:subjects',
            'description'  => 'nullable|string',
            'status'       => 'required|in:Active,Inactive',
        ]);

        Subject::create($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject added successfully.');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'subject_name' => 'required|max:255',
            'subject_code' => 'required|max:50|unique:subjects,subject_code,' . $subject->id,
            'description'  => 'nullable|string',
            'status'       => 'required|in:Active,Inactive',
        ]);

        $subject->update($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject deleted successfully.');
    }
}