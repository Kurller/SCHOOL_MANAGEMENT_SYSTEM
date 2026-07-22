<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Enrollment
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('enrollments.update', $enrollment) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4">

                        <!-- Student -->
                        <div class="col-span-2">
                            <label class="block font-medium mb-1">
                                Student
                            </label>

                            <select
                                name="student_id"
                                class="w-full border rounded p-2">

                                @foreach($students as $student)

                                    <option
                                        value="{{ $student->id }}"
                                        {{ old('student_id', $enrollment->student_id) == $student->id ? 'selected' : '' }}>

                                        {{ $student->student_id }}
                                        -
                                        {{ $student->first_name }}
                                        {{ $student->last_name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Class -->
                        <div>
                            <label class="block font-medium mb-1">
                                Class
                            </label>

                            <select
                                name="school_class_id"
                                class="w-full border rounded p-2">

                                @foreach($classes as $class)

                                    <option
                                        value="{{ $class->id }}"
                                        {{ old('school_class_id', $enrollment->school_class_id) == $class->id ? 'selected' : '' }}>

                                        {{ $class->class_name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Academic Session -->
                        <div>
                            <label class="block font-medium mb-1">
                                Academic Session
                            </label>

                            <input
                                type="text"
                                name="academic_session"
                                value="{{ old('academic_session', $enrollment->academic_session) }}"
                                class="w-full border rounded p-2">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block font-medium mb-1">
                                Status
                            </label>

                            <select
                                name="status"
                                class="w-full border rounded p-2">

                                <option value="Active"
                                    {{ old('status', $enrollment->status) == 'Active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="Graduated"
                                    {{ old('status', $enrollment->status) == 'Graduated' ? 'selected' : '' }}>
                                    Graduated
                                </option>

                                <option value="Transferred"
                                    {{ old('status', $enrollment->status) == 'Transferred' ? 'selected' : '' }}>
                                    Transferred
                                </option>

                                <option value="Suspended"
                                    {{ old('status', $enrollment->status) == 'Suspended' ? 'selected' : '' }}>
                                    Suspended
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="mt-6 flex gap-3">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                            Update Enrollment
                        </button>

                        <a href="{{ route('enrollments.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>