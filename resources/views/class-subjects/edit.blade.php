<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Class Subject Assignment
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

                <form action="{{ route('class-subjects.update', $assignment) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4">

                        <!-- Class -->
                        <div>
                            <label class="block font-medium mb-2">
                                Class
                            </label>

                            <select name="school_class_id"
                                    class="w-full border rounded p-2">

                                @foreach($classes as $class)

                                    <option value="{{ $class->id }}"
                                        {{ old('school_class_id', $assignment->school_class_id) == $class->id ? 'selected' : '' }}>

                                        {{ $class->class_name }}

                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="block font-medium mb-2">
                                Subject
                            </label>

                            <select name="subject_id"
                                    class="w-full border rounded p-2">

                                @foreach($subjects as $subject)

                                    <option value="{{ $subject->id }}"
                                        {{ old('subject_id', $assignment->subject_id) == $subject->id ? 'selected' : '' }}>

                                        {{ $subject->subject_name }}

                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <!-- Teacher -->
                        <div class="col-span-2">

                            <label class="block font-medium mb-2">
                                Teacher
                            </label>

                            <select name="teacher_id"
                                    class="w-full border rounded p-2">

                                @foreach($teachers as $teacher)

                                    <option value="{{ $teacher->id }}"
                                        {{ old('teacher_id', $assignment->teacher_id) == $teacher->id ? 'selected' : '' }}>

                                        {{ $teacher->first_name }}
                                        {{ $teacher->last_name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="mt-6 flex gap-3">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">

                            Update Assignment

                        </button>

                        <a href="{{ route('class-subjects.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>