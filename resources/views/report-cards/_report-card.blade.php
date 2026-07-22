<div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl p-4 sm:p-6 lg:p-8">

    {{-- School Header --}}
    <div class="text-center border-b pb-6">

        @if($setting && $setting->logo)
            <img
                src="{{ asset('storage/'.$setting->logo) }}"
                class="w-20 h-20 sm:w-24 sm:h-24 mx-auto mb-4 object-cover">
        @endif

        <h1 class="text-2xl sm:text-3xl font-bold">
            {{ $setting->school_name }}
        </h1>

        <p class="text-sm sm:text-base">
            {{ $setting->motto }}
        </p>

        <p class="text-sm text-gray-600">
            {{ $setting->address }}
        </p>

        <p class="text-sm text-gray-600 break-words">
            {{ $setting->phone }}
            |
            {{ $setting->email }}
        </p>

    </div>


    {{-- Student Details --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">

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
                {{ $setting->current_term }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Session</p>
            <p class="font-semibold">
                {{ $setting->current_session }}
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
    <div class="mt-8 overflow-x-auto">

        <table class="min-w-full border border-gray-300 text-sm">

            <thead class="bg-violet-700 text-white">

                <tr>

                    <th class="border px-3 py-2 whitespace-nowrap">Subject</th>
                    <th class="border px-3 py-2 whitespace-nowrap">CA</th>
                    <th class="border px-3 py-2 whitespace-nowrap">Exam</th>
                    <th class="border px-3 py-2 whitespace-nowrap">Total</th>
                    <th class="border px-3 py-2 whitespace-nowrap">Grade</th>
                    <th class="border px-3 py-2 whitespace-nowrap">Remark</th>

                </tr>

            </thead>

            <tbody>

            @foreach($results as $result)

                <tr class="hover:bg-gray-50">

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


    {{-- Summary --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">

        <div class="bg-violet-50 rounded-lg p-5 text-center">

            <h3 class="font-semibold text-gray-700">
                Total Score
            </h3>

            <p class="text-3xl font-bold text-violet-700 mt-2">
                {{ $total }}
            </p>

        </div>

        <div class="bg-green-50 rounded-lg p-5 text-center">

            <h3 class="font-semibold text-gray-700">
                Average
            </h3>

            <p class="text-3xl font-bold text-green-700 mt-2">
                {{ number_format($average,2) }}
            </p>

        </div>

    </div>


    {{-- Footer --}}
    <div class="mt-10 flex flex-col sm:flex-row gap-4 sm:justify-between">

        <a href="{{ $backRoute }}"
           class="w-full sm:w-auto bg-gray-600 hover:bg-gray-700 text-white text-center px-6 py-3 rounded-lg transition">

            Back

        </a>

        <button
            onclick="window.print()"
            class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">

            Print Report Card

        </button>

    </div>

</div>