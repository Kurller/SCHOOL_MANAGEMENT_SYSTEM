@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Student ID -->
    <div>
        <label class="block font-medium mb-1">Student ID</label>
    <input type="text"
           name="student_id"
           value="{{ old('student_id', $student->student_id ?? '') }}"
           class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
        @error('student_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Admission Number -->
    <div>
        <label class="block font-medium mb-1">Admission Number</label>
        <input type="text"
               name="admission_number"
               value="{{ old('admission_number', $student->admission_number ?? '') }}"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
    </div>

    <!-- First Name -->
    <div>
        <label class="block font-medium mb-1">First Name</label>
        <input type="text"
               name="first_name"
               value="{{ old('first_name', $student->first_name ?? '') }}"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
        @error('first_name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Last Name -->
    <div>
        <label class="block font-medium mb-1">Last Name</label>
        <input type="text"
               name="last_name"
               value="{{ old('last_name', $student->last_name ?? '') }}"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
        @error('last_name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Date of Birth -->
    <div>
        <label class="block font-medium mb-1">Date of Birth</label>
        <input type="date"
               name="date_of_birth"
               value="{{ old('date_of_birth', $student->date_of_birth ?? '') }}"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
    </div>

    <!-- Admission Date -->
    <div>
        <label class="block font-medium mb-1">Admission Date</label>
        <input type="date"
               name="admission_date"
               value="{{ old('admission_date', $student->admission_date ?? '') }}"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
    </div>

    <!-- Gender -->
    <div>
        <label class="block font-medium mb-1">Gender</label>

        <select name="gender" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
            <option value="">Select Gender</option>

            <option value="Male"
                {{ old('gender', $student->gender ?? '') == 'Male' ? 'selected' : '' }}>
                Male
            </option>

            <option value="Female"
                {{ old('gender', $student->gender ?? '') == 'Female' ? 'selected' : '' }}>
                Female
            </option>
        </select>
    </div>

    <!-- Phone -->
    <div>
        <label class="block font-medium mb-1">Phone</label>
        <input type="text"
               name="phone"
               value="{{ old('phone', $student->phone ?? '') }}"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
    </div>

    <!-- Email -->
    <div>
        <label class="block font-medium mb-1">Email</label>
        <input type="email"
               name="email"
               value="{{ old('email', $student->email ?? '') }}"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
    </div>

    <!-- Guardian Name -->
    <div>
        <label class="block font-medium mb-1">Guardian Name</label>
        <input type="text"
               name="guardian_name"
               value="{{ old('guardian_name', $student->guardian_name ?? '') }}"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
    </div>

    <!-- Guardian Phone -->
    <div>
        <label class="block font-medium mb-1">Guardian Phone</label>
        <input type="text"
               name="guardian_phone"
               value="{{ old('guardian_phone', $student->guardian_phone ?? '') }}"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
    </div>

    <!-- Status -->
    <div>
        <label class="block font-medium mb-1">Status</label>

        <select name="status" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">
            <option value="Active"
                {{ old('status', $student->status ?? '') == 'Active' ? 'selected' : '' }}>
                Active
            </option>

            <option value="Inactive"
                {{ old('status', $student->status ?? '') == 'Inactive' ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>

    <!-- Photo -->
    <div>
        <label class="block font-medium mb-1">Passport Photo</label>

        <input type="file"
               name="photo"
               class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">

        @if(isset($student) && $student->photo)
            <img src="{{ asset('storage/'.$student->photo) }}"
                 class="w-24 h-24 rounded mt-2 object-cover">
        @endif
    </div>

</div>

<!-- Address -->
<div class="mt-6">
    <label class="block font-medium mb-1">Address</label>

    <textarea name="address"
              rows="4"
              class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500">{{ old('address', $student->address ?? '') }}</textarea>
</div>

<div class="mt-6">
    <button type="submit"
            class="bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white px-6 py-2 rounded-lg shadow transition transform hover:scale-105">
        Save Student
    </button>
</div>