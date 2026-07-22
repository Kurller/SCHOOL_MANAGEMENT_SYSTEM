<x-app-layout>

<div class="max-w-6xl mx-auto bg-white shadow rounded-xl p-4 sm:p-6 lg:p-8">

    {{-- School Header --}}
    <div class="text-center border-b pb-6">

        @if($school && $school->logo)
            <img
                src="{{ asset('storage/'.$school->logo) }}"
                class="w-20 h-20 sm:w-24 sm:h-24 mx-auto mb-4 object-cover">
        @endif

        <h1 class="text-xl sm:text-3xl font-bold">
            {{ $school->school_name }}
        </h1>

        <p class="text-sm sm:text-base">
            {{ $school->motto }}
        </p>

        <p class="text-sm text-gray-600">
            {{ $school->address }}
        </p>

        <p class="text-sm text-gray-600">
            {{ $school->phone }}
            |
            {{ $school->email }}
        </p>

    </div>


    {{-- Student Information --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">

        <div>
            <strong>Student:</strong><br>
            {{ $student->first_name }}
            {{ $student->last_name }}
        </div>

        <div>
            <strong>Admission No:</strong><br>
            {{ $student->student_id }}
        </div>

        <div>
            <strong>Class:</strong><br>
            {{ $student->schoolClass->class_name ?? '-' }}
        </div>

        <div>
            <strong>Session:</strong><br>
            {{ $school->current_session }}
        </div>

        <div>
            <strong>Term:</strong><br>
            {{ $school->current_term }}
        </div>

    </div>


    {{-- Results --}}
    <div class="mt-8 overflow-x-auto">

        <table class="min-w-full border border-collapse text-sm">

            <thead class="bg-violet-700 text-white">

            <tr>

                <th class="border px-2 py-2">Subject</th>
                <th class="border px-2 py-2">CA</th>
                <th class="border px-2 py-2">Exam</th>
                <th class="border px-2 py-2">Total</th>
                <th class="border px-2 py-2">Grade</th>
                <th class="border px-2 py-2">Remark</th>

            </tr>

            </thead>

            <tbody>

            @foreach($results as $result)

                <tr class="hover:bg-gray-50">

                    <td class="border px-2 py-2">
                        {{ $result->subject->subject_name }}
                    </td>

                    <td class="border px-2 py-2 text-center">
                        {{ $result->ca_score }}
                    </td>

                    <td class="border px-2 py-2 text-center">
                        {{ $result->exam_score }}
                    </td>

                    <td class="border px-2 py-2 text-center font-semibold">
                        {{ $result->total_score }}
                    </td>

                    <td class="border px-2 py-2 text-center">
                        {{ $result->grade }}
                    </td>

                    <td class="border px-2 py-2 text-center">
                        {{ $result->remark }}
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>


    {{-- Summary --}}
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4">

        <div class="bg-violet-100 rounded-lg p-4 text-center">

            <h4 class="font-bold">Total Score</h4>

            <p class="text-2xl font-bold">
                {{ $total }}
            </p>

        </div>

        <div class="bg-green-100 rounded-lg p-4 text-center">

            <h4 class="font-bold">Average</h4>

            <p class="text-2xl font-bold">
                {{ number_format($average,2) }}
            </p>

        </div>

        <div class="bg-yellow-100 rounded-lg p-4 text-center">

            <h4 class="font-bold">Position</h4>

            <p class="text-2xl font-bold">
                {{ $position }}
            </p>

        </div>

    </div>

</div>

</x-app-layout>