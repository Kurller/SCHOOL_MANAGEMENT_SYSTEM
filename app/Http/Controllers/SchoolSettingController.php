<?php

namespace App\Http\Controllers;

use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

        // Logo
        if ($request->hasFile('logo')) {
            $result = Cloudinary::uploadApi()->upload(
        $request->file('logo')->getRealPath(),
        [
            'folder' => 'school-management/logos',
        ]
    );

$validated['logo'] = $result['secure_url'];
        }

        // Principal Signature
        if ($request->hasFile('principal_signature')) {

    $result = Cloudinary::uploadApi()->upload(
    $request->file('principal_signature')->getRealPath(),
    [
        'folder' => 'school-management/signatures',
    ]
);

$validated['principal_signature'] = $result['secure_url'];

    
}

        // School Stamp
        if ($request->hasFile('school_stamp')) {

    $result = Cloudinary::uploadApi()
        ->upload(
            $request->file('school_stamp')->getRealPath(),
            [
                'folder' => 'school-management/stamps',
            ]
        );

    $validated['school_stamp'] = $result['secure_url'];
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

        // Logo
        if ($request->hasFile('logo')) {

    $result = Cloudinary::uploadApi()
        ->upload(
            $request->file('logo')->getRealPath(),
            [
                'folder' => 'school-management/logos',
            ]
        );

    $validated['logo'] = $result['secure_url'];
}

        // Principal Signature
        if ($request->hasFile('principal_signature')) {

    $result = Cloudinary::uploadApi()
        ->upload(
            $request->file('principal_signature')->getRealPath(),
            [
                'folder' => 'school-management/signatures',
            ]
        );

    $validated['principal_signature'] = $result['secure_url'];
}

        // School Stamp
        if ($request->hasFile('school_stamp')) {

    $result = Cloudinary::uploadApi()
        ->upload(
            $request->file('school_stamp')->getRealPath(),
            [
                'folder' => 'school-management/stamps',
            ]
        );

    $validated['school_stamp'] = $result['secure_url'];
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