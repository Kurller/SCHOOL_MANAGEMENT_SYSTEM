<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600 leading-tight">
            Enroll Student
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden">

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded transition">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white px-6 py-4">
                    <h3 class="text-lg font-semibold">Enroll Student</h3>
                </div>

                <div class="p-6">

                <form action="{{ route('enrollments.store') }}" method="POST">

                    @csrf

                    <div class="grid grid-cols-2 gap-4">

                        <!-- Student -->
                        <div class="col-span-2">
                            <label class="block font-medium mb-1">
                                Student
                            </label>

                            <select name="student_id"
                                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">

                                <option value="">Select Student</option>

                                @foreach($students as $student)

                                    <option value="{{ $student->id }}"
                                        {{ old('student_id') == $student->id ? 'selected' : '' }}>

                                        {{ $student->student_id }} -
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

                            <select name="school_class_id"
                                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">

                                <option value="">Select Class</option>

                                @foreach($classes as $class)

                                    <option value="{{ $class->id }}"
                                        {{ old('school_class_id') == $class->id ? 'selected' : '' }}>

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
                                value="{{ old('academic_session') }}"
                                placeholder="2026/2027"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block font-medium mb-1">
                                Status
                            </label>

                            <select
                                name="status"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">

                                <option value="Active">Active</option>
                                <option value="Graduated">Graduated</option>
                                <option value="Transferred">Transferred</option>
                                <option value="Suspended">Suspended</option>

                            </select>

                        </div>

                    </div>

                    <div class="mt-6 flex gap-3">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                            Save Enrollment
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
    </div>
</x-app-layout>