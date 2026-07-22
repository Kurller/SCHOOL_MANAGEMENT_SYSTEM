<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Add Student Result
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto">

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-4 rounded">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('results.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-2 gap-6">

                        <!-- Student -->
                        <div>
                            <label class="block font-medium mb-1">
                                Student
                            </label>

                            <select name="student_id" class="w-full border rounded p-2">
                                <option value="">Select Student</option>

                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">
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

                            <select name="school_class_id" class="w-full border rounded p-2">
                                <option value="">Select Class</option>

                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="block font-medium mb-1">
                                Subject
                            </label>

                            <select name="subject_id" class="w-full border rounded p-2">
                                <option value="">Select Subject</option>

                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Term -->
                        <div>
                            <label class="block font-medium mb-1">
                                Term
                            </label>

                            <select name="term" class="w-full border rounded p-2">
                                <option>First Term</option>
                                <option>Second Term</option>
                                <option>Third Term</option>
                            </select>
                        </div>

                        <!-- Session -->
                        <div>
                            <label class="block font-medium mb-1">
                                Academic Session
                            </label>

                            <input
                                type="text"
                                name="session"
                                value="{{ old('session','2026/2027') }}"
                                class="w-full border rounded p-2">
                        </div>

                        <!-- CA -->
                        <div>
                            <label class="block font-medium mb-1">
                                Continuous Assessment (40)
                            </label>

                            <input
                                type="number"
                                name="ca_score"
                                min="0"
                                max="40"
                                value="{{ old('ca_score') }}"
                                class="w-full border rounded p-2">
                        </div>

                        <!-- Exam -->
                        <div>
                            <label class="block font-medium mb-1">
                                Exam Score (60)
                            </label>

                            <input
                                type="number"
                                name="exam_score"
                                min="0"
                                max="60"
                                value="{{ old('exam_score') }}"
                                class="w-full border rounded p-2">
                        </div>

                    </div>

                    <div class="mt-6">

                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">

                            Save Result

                        </button>

                        <a href="{{ route('results.index') }}"
                           class="ml-2 bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>