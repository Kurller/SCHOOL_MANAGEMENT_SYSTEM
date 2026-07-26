<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Student Report Card
        </h2>
    </x-slot>

    <div class="py-6 min-h-screen bg-gradient-to-br from-violet-100 via-fuchsia-100 to-pink-100">
        <div class="max-w-6xl mx-auto">

            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">

                <!-- School Header -->
                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white p-8 text-center">

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

                        <thead class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white">

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

                            <tr class="hover:bg-fuchsia-50 transition-colors">

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
                           class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-6 py-3 rounded-lg font-medium transition-colors">

                            Back

                        </a>

                        <button
                            onclick="window.print()"
                            class="bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white px-6 py-3 rounded-lg font-medium transition-colors shadow-lg">

                            Print Report Card

                        </button>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>