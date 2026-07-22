<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $classes = SchoolClass::when($search, function ($query, $search) {
            $query->where('class_name', 'like', "%{$search}%")
                  ->orWhere('class_code', 'like', "%{$search}%")
                  ->orWhere('level', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

        return view('classes.index', compact('classes', 'search'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|unique:school_classes',
            'class_code' => 'required|unique:school_classes',
            'level' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:Active,Inactive',
        ]);

        SchoolClass::create($validated);

        return redirect()
            ->route('classes.index')
            ->with('success', 'Class created successfully.');
    }

    public function show(SchoolClass $class)
    {
        return view('classes.show', compact('class'));
    }

    public function edit(SchoolClass $class)
    {
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $validated = $request->validate([
            'class_name' => 'required|unique:school_classes,class_name,' . $class->id,
            'class_code' => 'required|unique:school_classes,class_code,' . $class->id,
            'level' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:Active,Inactive',
        ]);

        $class->update($validated);

        return redirect()
            ->route('classes.index')
            ->with('success', 'Class updated successfully.');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();

        return redirect()
            ->route('classes.index')
            ->with('success', 'Class deleted successfully.');
    }
}