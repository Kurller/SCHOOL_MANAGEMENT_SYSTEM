<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Add Student Result
        </h2>
    </x-slot>

    <div class="py-6 min-h-screen bg-gradient-to-br from-violet-100 via-fuchsia-100 to-pink-100">
        <div class="max-w-5xl mx-auto">

            @if ($errors->any())
                <div class="mb-4 bg-gradient-to-r from-red-100 to-rose-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">

                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white p-6">
                    <h3 class="text-xl font-bold">Add Result</h3>
                    <p class="text-white/80 text-sm mt-1">Enter student result details</p>
                </div>

                <div class="p-6">
                    <form action="{{ route('results.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-2 gap-6">

                            <!-- Student -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Student</label>

                                <select name="student_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                                    <option value="">Select Student</option>

                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}"
                                            {{ old('student_id') == $student->id ? 'selected' : '' }}>
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
                                <label class="block font-medium text-gray-700 mb-1">Class</label>

                                <select name="school_class_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                                    <option value="">Select Class</option>

                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ old('school_class_id') == $class->id ? 'selected' : '' }}>
                                            {{ $class->class_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Subject</label>

                                <select name="subject_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                                    <option value="">Select Subject</option>

                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->subject_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Term -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Term</label>

                                @php
                                    $currentTerm = old('term', $setting->current_term ?? '');
                                @endphp

                                <select name="term" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                                    <option value="First Term" {{ $currentTerm == 'First Term' ? 'selected' : '' }}>
                                        First Term
                                    </option>
                                    <option value="Second Term" {{ $currentTerm == 'Second Term' ? 'selected' : '' }}>
                                        Second Term
                                    </option>
                                    <option value="Third Term" {{ $currentTerm == 'Third Term' ? 'selected' : '' }}>
                                        Third Term
                                    </option>
                                </select>
                            </div>

                            <!-- Session -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Academic Session</label>

                                <input
                                    type="text"
                                    name="session"
                                    value="{{ old('session', $setting->current_session ?? '') }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">

                                @if(empty($setting))
                                    <p class="text-sm text-red-600 mt-1">
                                        No school setting found — please set the current term and session in School Settings first.
                                    </p>
                                @endif
                            </div>

                            <!-- CA -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Continuous Assessment (40)</label>

                                <input
                                    type="number"
                                    name="ca_score"
                                    min="0"
                                    max="40"
                                    value="{{ old('ca_score') }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Exam -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Exam Score (60)</label>

                                <input
                                    type="number"
                                    name="exam_score"
                                    min="0"
                                    max="60"
                                    value="{{ old('exam_score') }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                        </div>

                        <div class="mt-6">

                            <button
                                class="bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white px-6 py-2 rounded-lg font-semibold shadow-lg transition-all">

                                Save Result

                            </button>

                            <a href="{{ route('results.index') }}"
                               class="ml-2 bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">

                                Cancel

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>