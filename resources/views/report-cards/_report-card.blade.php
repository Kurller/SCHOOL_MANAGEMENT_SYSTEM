<div class="max-w-5xl mx-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">

    {{-- School Header --}}
    <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white p-6 sm:p-8 text-center">

        @if($school && $school->logo)
            <img src="{{ $setting->logo }}"
                class="w-20 h-20 sm:w-24 sm:h-24 mx-auto mb-4 object-cover">
        @endif

        <h1 class="text-2xl sm:text-3xl font-bold">
            {{ $school->school_name }}
        </h1>

        <p class="text-white/80 text-sm sm:text-base">
            {{ $school->motto }}
        </p>

        <p class="text-white/70 text-sm">
            {{ $school->address }}
        </p>

        <p class="text-white/70 text-sm break-words">
            {{ $school->phone }}
            |
            {{ $school->email }}
        </p>

    </div>


    {{-- Student Details --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8 p-6 sm:p-8">

        <div>
            <p class="text-sm text-gray-500">Student</p>
            <p class="font-semibold">
                {{ $student->first_name }}
                {{ $student->last_name }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Admission No</p>
            <p class="font-semibold">
                {{ $student->admission_number }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Class</p>
            <p class="font-semibold">
                {{ $student->schoolClass->class_name ?? 'Not Assigned' }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Term</p>
            <p class="font-semibold">
                {{ $school->current_term }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Session</p>
            <p class="font-semibold">
                {{ $school->current_session }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Position</p>
            <p class="font-semibold text-violet-700">
                {{ $position }}
            </p>
        </div>

    </div>


    {{-- Results --}}
    <div class="mt-4 px-6 sm:px-8 pb-6">

        <div class="overflow-x-auto rounded-xl border border-gray-200">

            <table class="min-w-full">

                <thead class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white">

                    <tr>

                        <th class="border px-3 py-3 whitespace-nowrap">Subject</th>
                        <th class="border px-3 py-3 whitespace-nowrap">CA</th>
                        <th class="border px-3 py-3 whitespace-nowrap">Exam</th>
                        <th class="border px-3 py-3 whitespace-nowrap">Total</th>
                        <th class="border px-3 py-3 whitespace-nowrap">Grade</th>
                        <th class="border px-3 py-3 whitespace-nowrap">Remark</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($results as $result)

                    <tr class="hover:bg-fuchsia-50 transition-colors border-b border-gray-100">

                        <td class="border px-3 py-2">
                            {{ $result->subject->subject_name }}
                        </td>

                        <td class="border px-3 py-2 text-center">
                            {{ $result->ca_score }}
                        </td>

                        <td class="border px-3 py-2 text-center">
                            {{ $result->exam_score }}
                        </td>

                        <td class="border px-3 py-2 text-center font-bold">
                            {{ $result->total_score }}
                        </td>

                        <td class="border px-3 py-2 text-center">
                            {{ $result->grade }}
                        </td>

                        <td class="border px-3 py-2 text-center">
                            {{ $result->remark }}
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>


    {{-- Summary --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4 px-6 sm:px-8 pb-6">

        <div class="bg-gradient-to-br from-violet-50 to-fuchsia-50 rounded-xl p-5 text-center border border-violet-200">

            <h3 class="font-semibold text-gray-700">
                Total Score
            </h3>

            <p class="text-3xl font-bold text-violet-700 mt-2">
                {{ $total }}
            </p>

        </div>

        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 text-center border border-green-200">

            <h3 class="font-semibold text-gray-700">
                Average
            </h3>

            <p class="text-3xl font-bold text-green-700 mt-2">
                {{ number_format($average,2) }}
            </p>

        </div>

    </div>


    {{-- Footer --}}
    <div class="mt-10 flex flex-col sm:flex-row gap-4 sm:justify-between p-6 sm:px-8 sm:pb-8">

        <a href="{{ $backRoute }}"
           class="w-full sm:w-auto bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white text-center px-6 py-3 rounded-lg font-medium transition-colors shadow-md">

            Back

        </a>

        <button
            onclick="window.print()"
            class="w-full sm:w-auto bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white px-6 py-3 rounded-lg font-medium transition-colors shadow-lg">

            Print Report Card

        </button>

    </div>

</div>