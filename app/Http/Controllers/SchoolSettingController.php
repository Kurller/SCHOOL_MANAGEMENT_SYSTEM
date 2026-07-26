<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;

class SchoolSettingController extends Controller
{
    public function index()
    {
        $setting = SchoolSetting::first();

        return view('school-settings.index', compact('setting'));
    }

    public function create()
    {
        return view('school-settings.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'school_name' => 'required|string|max:255',
        'motto' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email',
        'website' => 'nullable|string|max:255',
        'principal' => 'nullable|string|max:255',
        'current_session' => 'required|string|max:20',
        'current_term' => 'required|string|max:20',

        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'principal_signature' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'school_stamp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('logo')) {
        $validated['logo'] = $request->file('logo')
            ->store('school-settings', 'public');
    }

    if ($request->hasFile('principal_signature')) {
        $validated['principal_signature'] = $request->file('principal_signature')
            ->store('school-settings', 'public');
    }

    if ($request->hasFile('school_stamp')) {
        $validated['school_stamp'] = $request->file('school_stamp')
            ->store('school-settings', 'public');
    }

    SchoolSetting::create($validated);

    return redirect()
        ->route('school-settings.index')
        ->with('success', 'School settings saved successfully.');
}
    public function edit(SchoolSetting $school_setting)
    {
        return view('school-settings.edit', [
            'setting' => $school_setting
        ]);
    }

    public function update(Request $request, SchoolSetting $school_setting)
{
    $validated = $request->validate([
        'school_name' => 'required|string|max:255',
        'motto' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email',
        'website' => 'nullable|string|max:255',
        'principal' => 'nullable|string|max:255',
        'current_session' => 'required|string|max:20',
        'current_term' => 'required|string|max:20',

        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'principal_signature' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'school_stamp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('logo')) {

        if ($school_setting->logo) {
            Storage::disk('public')->delete($school_setting->logo);
        }

        $validated['logo'] = $request->file('logo')
            ->store('school-settings', 'public');
    }

    if ($request->hasFile('principal_signature')) {

        if ($school_setting->principal_signature) {
            Storage::disk('public')->delete($school_setting->principal_signature);
        }

        $validated['principal_signature'] = $request->file('principal_signature')
            ->store('school-settings', 'public');
    }

    if ($request->hasFile('school_stamp')) {

        if ($school_setting->school_stamp) {
            Storage::disk('public')->delete($school_setting->school_stamp);
        }

        $validated['school_stamp'] = $request->file('school_stamp')
            ->store('school-settings', 'public');
    }

    $school_setting->update($validated);

    return redirect()
        ->route('school-settings.index')
        ->with('success', 'School settings updated successfully.');
}
    public function destroy(SchoolSetting $school_setting)
    {
        $school_setting->delete();

        return redirect()
            ->route('school-settings.index')
            ->with('success', 'School settings deleted successfully.');
    }
}