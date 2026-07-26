<x-app-layout>

<x-slot name="header">
    <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
        Parent Dashboard
    </h2>
</x-slot>

<div class="max-w-7xl mx-auto py-8">

    <!-- Dashboard Cards -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 transition hover:shadow-2xl hover:scale-105">
            <h3 class="text-gray-500">Children</h3>
            <p class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
                {{ $students->count() }}
            </p>
        </div>

        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 transition hover:shadow-2xl hover:scale-105">
            <h3 class="text-gray-500">Results</h3>
            <p class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-600">
                {{ $results->count() }}
            </p>
        </div>

        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 transition hover:shadow-2xl hover:scale-105">
            <h3 class="text-gray-500">Fee Records</h3>
            <p class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-600">
                {{ $fees->count() }}
            </p>
        </div>

    </div>

    <!-- My Children -->

    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 mb-8 transition hover:shadow-2xl">

        <h3 class="text-xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            My Children
        </h3>

        @forelse($students as $student)

            <div class="border-b py-4">

                <h4 class="font-semibold text-lg">
                    {{ $student->first_name }} {{ $student->last_name }}
                </h4>

                <p class="text-gray-600">
                    <strong>Admission No:</strong>
                    {{ $student->admission_number }}
                </p>

                <p class="text-gray-600">
                    <strong>Class:</strong>
                    {{ $student->schoolClass->class_name ?? 'Not Assigned' }}
                </p>

                <div class="mt-4 flex gap-3">

                    <a href="{{ route('parent.results.index') }}"
                       class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-4 py-2 rounded-lg shadow transition transform hover:scale-105">
                        View Results
                    </a>

                    <a href="{{ route('parent.report-card', $student->id) }}"
                       class="bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white px-4 py-2 rounded-lg shadow transition transform hover:scale-105">
                        View Report Card
                    </a>

                </div>

            </div>

        @empty

            <p class="text-gray-500">
                No children found.
            </p>

        @endforelse

    </div>

    <!-- Recent Results -->

    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 mb-8 transition hover:shadow-2xl">

        <h3 class="text-xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Recent Results
        </h3>

        <table class="w-full">

            <thead>

                <tr class="border-b">
                    <th class="text-left py-2">Student</th>
                    <th class="text-left py-2">Subject</th>
                    <th class="text-left py-2">Score</th>
                    <th class="text-left py-2">Grade</th>
                </tr>

            </thead>

            <tbody>

            @forelse($results as $result)

                <tr class="border-b">

                    <td class="py-2">
                        {{ $result->student->first_name }}
                        {{ $result->student->last_name }}
                    </td>

                    <td>
                        {{ $result->subject->subject_name }}
                    </td>

                    <td>
                        {{ $result->total_score }}
                    </td>

                    <td>
                        {{ $result->grade }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="py-4 text-center">
                        No results available.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <!-- Fee Records -->

    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 transition hover:shadow-2xl">

        <h3 class="text-xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Fee Records
        </h3>

        <table class="w-full">

            <thead>

                <tr class="border-b">
                    <th class="text-left py-2">Student</th>
                    <th class="text-left py-2">Amount</th>
                    <th class="text-left py-2">Status</th>
                </tr>

            </thead>

            <tbody>

            @forelse($fees as $fee)

                <tr class="border-b">

                    <td class="py-2">
                        {{ $fee->student->first_name }}
                        {{ $fee->student->last_name }}
                    </td>

                    <td>
                        ₦{{ number_format($fee->amount, 2) }}
                    </td>

                    <td>
                        {{ $fee->status }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="py-4 text-center">
                        No fee records available.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>