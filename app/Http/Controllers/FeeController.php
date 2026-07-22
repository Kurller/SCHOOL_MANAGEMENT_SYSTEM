<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::with(['student', 'schoolClass'])
            ->latest()
            ->paginate(10);

        return view('fees.index', compact('fees'));
    }

    public function create()
    {
        $students = Student::orderBy('first_name')->get();
        $classes = SchoolClass::where('status', 'Active')->get();

        return view('fees.create', compact(
            'students',
            'classes'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'      => 'required|exists:students,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'amount'          => 'required|numeric|min:0',
            'term'            => 'required',
            'session'         => 'required',
            'payment_date'    => 'required|date',
            'status'          => 'required',
        ]);

        Fee::create($validated);

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee recorded successfully.');
    }

    public function show(Fee $fee)
    {
        return view('fees.show', compact('fee'));
    }

    public function edit(Fee $fee)
    {
        $students = Student::orderBy('first_name')->get();
        $classes = SchoolClass::where('status', 'Active')->get();

        return view('fees.edit', compact(
            'fee',
            'students',
            'classes'
        ));
    }

    public function update(Request $request, Fee $fee)
    {
        $validated = $request->validate([
            'student_id'      => 'required|exists:students,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'amount'          => 'required|numeric|min:0',
            'term'            => 'required',
            'session'         => 'required',
            'payment_date'    => 'required|date',
            'status'          => 'required',
        ]);

        $fee->update($validated);

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee updated successfully.');
    }

    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee deleted successfully.');
    }
}