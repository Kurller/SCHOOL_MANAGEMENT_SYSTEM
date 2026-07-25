<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            Student Report Card
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-8">

        <div class="bg-white shadow-xl rounded-xl overflow-hidden">

            <!-- School Header -->
            <div class="bg-violet-700 text-white p-8 text-center">

                @if($school && $school->logo)
                    <img src="{{ asset('storage/'.$school->logo) }}"
                         class="w-24 h-24 mx-auto mb-4 object-contain">
                @endif

                <h1 class="text-3xl font-bold">
                    {{ $school->school_name }}
                </h1>

                <p>{{ $school->motto }}</p>

                <p>{{ $school->address }}</p>

                <p>
                    {{ $school->phone }}
                    |
                    {{ $school->email }}
                </p>

            </div>

            <div class="p-8">

                <!-- Student Information -->

                <div class="grid md:grid-cols-2 gap-6 mb-8">

                    <div>
                        <strong>Student Name:</strong><br>
                        {{ $student->first_name }}
                        {{ $student->last_name }}
                    </div>

                    <div>
                        <strong>Admission No:</strong><br>
                        {{ $student->admission_number }}
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

                <!-- Results -->

                <table class="w-full border-collapse border">

                    <thead class="bg-violet-600 text-white">

                        <tr>

                            <th class="border p-3">Subject</th>

                            <th class="border p-3">CA</th>

                            <th class="border p-3">Exam</th>

                            <th class="border p-3">Total</th>

                            <th class="border p-3">Grade</th>

                            <th class="border p-3">Remark</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($results as $result)

                        <tr>

                            <td class="border p-3">
                                {{ $result->subject->subject_name }}
                            </td>

                            <td class="border p-3 text-center">
                                {{ $result->ca_score }}
                            </td>

                            <td class="border p-3 text-center">
                                {{ $result->exam_score }}
                            </td>

                            <td class="border p-3 text-center font-bold">
                                {{ $result->total_score }}
                            </td>

                            <td class="border p-3 text-center">
                                {{ $result->grade }}
                            </td>

                            <td class="border p-3 text-center">
                                {{ $result->remark }}
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

                <!-- Summary -->

                <div class="mt-8 flex justify-end">

                    <table>

                        <tr>

                            <td class="font-bold pr-6">
                                Total Score
                            </td>

                            <td>
                                {{ number_format($total,2) }}
                            </td>

                        </tr>

                        <tr>

                            <td class="font-bold pr-6">
                                Average Score
                            </td>

                            <td>
                                {{ number_format($average,2) }}
                            </td>

                        </tr>

                        <tr>

                            <td class="font-bold pr-6">
                                Position
                            </td>

                            <td>
                                {{ $position }}
                            </td>

                        </tr>

                    </table>

                </div>

                <!-- Signature -->

                <div class="grid md:grid-cols-2 gap-10 mt-16">

                    <div class="text-center">

                        @if($school && $school->principal_signature)

                            <img src="{{ asset('storage/'.$school->principal_signature) }}"
                                 class="h-20 mx-auto">

                        @endif

                        <hr>

                        Principal Signature

                    </div>

                    <div class="text-center">

                        @if($school && $school->school_stamp)

                            <img src="{{ asset('storage/'.$school->school_stamp) }}"
                                 class="h-24 mx-auto">

                        @endif

                        <hr>

                        School Stamp

                    </div>

                </div>

                <!-- Buttons -->

                <div class="mt-10 flex justify-between">

                    <a href="{{ route('results.index') }}"
                       class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded">

                        Back

                    </a>

                    <button
                        onclick="window.print()"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded">

                        Print Report Card

                    </button>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>