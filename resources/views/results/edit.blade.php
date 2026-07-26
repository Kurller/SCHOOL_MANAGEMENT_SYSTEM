<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Edit Result
        </h2>
    </x-slot>

    <div class="py-6 min-h-screen bg-gradient-to-br from-violet-100 via-fuchsia-100 to-pink-100">
        <div class="max-w-5xl mx-auto">

            @if ($errors->any())
                <div class="mb-4 bg-gradient-to-r from-red-100 to-rose-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc pl-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">

                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white p-6">
                    <h3 class="text-xl font-bold">Edit Result</h3>
                    <p class="text-white/80 text-sm mt-1">Update student result details</p>
                </div>

                <div class="p-6">
                    <form action="{{ route('results.update', $result) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-6">

                            <!-- Student -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Student</label>

                                <select name="student_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
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
                                <label class="block font-medium text-gray-700 mb-1">Class</label>

                                <select name="school_class_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
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
                                <label class="block font-medium text-gray-700 mb-1">Subject</label>

                                <select name="subject_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
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
                                <label class="block font-medium text-gray-700 mb-1">Session</label>

                                <input
                                    type="text"
                                    name="session"
                                    value="{{ old('session', $result->session) }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Term -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Term</label>

                                <select name="term" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                                    <option value="First" {{ old('term', $result->term) == 'First' ? 'selected' : '' }}>First</option>
                                    <option value="Second" {{ old('term', $result->term) == 'Second' ? 'selected' : '' }}>Second</option>
                                    <option value="Third" {{ old('term', $result->term) == 'Third' ? 'selected' : '' }}>Third</option>
                                </select>
                            </div>

                            <!-- CA Score -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">CA Score</label>

                                <input
                                    type="number"
                                    name="ca_score"
                                    max="40"
                                    value="{{ old('ca_score', $result->ca_score) }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Exam Score -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Exam Score</label>

                                <input
                                    type="number"
                                    name="exam_score"
                                    max="60"
                                    value="{{ old('exam_score', $result->exam_score) }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                        </div>

                        <div class="mt-8">
                            <button
                                class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-6 py-3 rounded-lg font-semibold shadow-lg transition-all">
                                Update Result
                            </button>

                            <a href="{{ route('results.index') }}"
                               class="ml-4 bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>