<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            Edit Result
        </h2>
    </x-slot>

    <div class="py-8 bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen">
        <div class="max-w-5xl mx-auto">

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">
                    <ul class="list-disc pl-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-lg p-8">

                <form action="{{ route('results.update', $result) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-6">

                        <!-- Student -->
                        <div>
                            <label class="font-semibold">Student</label>

                            <select name="student_id" class="w-full border rounded-lg p-2">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ old('student_id', $result->student_id) == $student->id ? 'selected' : '' }}>
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
                            <label class="font-semibold">Class</label>

                            <select name="school_class_id" class="w-full border rounded-lg p-2">
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}"
                                        {{ old('school_class_id', $result->school_class_id) == $class->id ? 'selected' : '' }}>
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="font-semibold">Subject</label>

                            <select name="subject_id" class="w-full border rounded-lg p-2">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ old('subject_id', $result->subject_id) == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Session -->
                        <div>
                            <label class="font-semibold">Session</label>

                            <input
                                type="text"
                                name="session"
                                value="{{ old('session', $result->session) }}"
                                class="w-full border rounded-lg p-2">
                        </div>

                        <!-- Term -->
                        <div>
                            <label class="font-semibold">Term</label>

                            <select name="term" class="w-full border rounded-lg p-2">
                                <option value="First" {{ old('term', $result->term) == 'First' ? 'selected' : '' }}>First</option>
                                <option value="Second" {{ old('term', $result->term) == 'Second' ? 'selected' : '' }}>Second</option>
                                <option value="Third" {{ old('term', $result->term) == 'Third' ? 'selected' : '' }}>Third</option>
                            </select>
                        </div>

                        <!-- CA Score -->
                        <div>
                            <label class="font-semibold">CA Score</label>

                            <input
                                type="number"
                                name="ca_score"
                                max="40"
                                value="{{ old('ca_score', $result->ca_score) }}"
                                class="w-full border rounded-lg p-2">
                        </div>

                        <!-- Exam Score -->
                        <div>
                            <label class="font-semibold">Exam Score</label>

                            <input
                                type="number"
                                name="exam_score"
                                max="60"
                                value="{{ old('exam_score', $result->exam_score) }}"
                                class="w-full border rounded-lg p-2">
                        </div>

                    </div>

                    <div class="mt-8">
                        <button
                            class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-lg">
                            Update Result
                        </button>

                        <a href="{{ route('results.index') }}"
                           class="ml-4 bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>