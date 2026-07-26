<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600 leading-tight">
            Edit Enrollment
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white">Edit Enrollment</h3>
                </div>

                <div class="p-6">

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
                                <label class="block text-gray-700 font-medium mb-1">
                                    Student
                                </label>

                                <select
                                    name="student_id"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">

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
                                <label class="block text-gray-700 font-medium mb-1">
                                    Class
                                </label>

                                <select
                                    name="school_class_id"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">

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
                                <label class="block text-gray-700 font-medium mb-1">
                                    Academic Session
                                </label>

                                <input
                                    type="text"
                                    name="academic_session"
                                    value="{{ old('academic_session', $enrollment->academic_session) }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">

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
                                class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white font-semibold px-6 py-2 rounded-lg shadow hover:shadow-lg transition duration-200 hover:scale-105">
                                Update Enrollment
                            </button>

                            <a href="{{ route('enrollments.index') }}"
                               class="bg-gradient-to-r from-gray-400 to-gray-500 text-white font-semibold px-6 py-2 rounded-lg shadow hover:shadow-lg transition duration-200 hover:scale-105">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>