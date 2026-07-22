<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Edit Attendance
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white">Edit Attendance</h3>
                </div>

                <div class="p-6">

                    <form action="{{ route('attendances.update',$attendance) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Student</label>

                                <select
                                    name="student_id"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">

                                    @foreach($students as $student)

                                        <option
                                            value="{{ $student->id }}"
                                            {{ $attendance->student_id==$student->id?'selected':'' }}>
                                            {{ $student->student_id }}
                                            {{ $student->first_name }}
                                            {{ $student->last_name }}
                                        </option>

                                    @endforeach

                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Class</label>

                                <select
                                    name="school_class_id"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">

                                    @foreach($classes as $class)

                                        <option
                                            value="{{ $class->id }}"
                                            {{ $attendance->school_class_id==$class->id?'selected':'' }}>
                                            {{ $class->class_name }}
                                        </option>

                                    @endforeach

                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>

                                <input
                                    type="date"
                                    name="attendance_date"
                                    value="{{ $attendance->attendance_date }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>

                                <select
                                    name="status"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">

                                    @foreach(['Present','Absent','Late','Excused'] as $status)

                                        <option
                                            value="{{ $status }}"
                                            {{ $attendance->status==$status?'selected':'' }}>
                                            {{ $status }}
                                        </option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Remarks</label>

                                <textarea
                                    name="remarks"
                                    rows="3"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">{{ $attendance->remarks }}</textarea>
                            </div>

                        </div>

                        <div class="mt-6 flex items-center gap-3">

                            <button
                                class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white font-semibold px-6 py-2 rounded-lg shadow hover:shadow-lg transition duration-200 hover:scale-105">
                                Update Attendance
                            </button>

                            <a href="{{ route('attendances.index') }}"
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
