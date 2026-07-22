<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            My Results
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8">

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-violet-700 text-white">

                    <tr>
                        <th class="px-4 py-3 text-left">Subject</th>
                        <th class="px-4 py-3 text-center">CA</th>
                        <th class="px-4 py-3 text-center">Exam</th>
                        <th class="px-4 py-3 text-center">Total</th>
                        <th class="px-4 py-3 text-center">Grade</th>
                        <th class="px-4 py-3 text-center">Remark</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($results as $result)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-4 py-3">
                                {{ $result->subject->subject_name }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                {{ $result->ca_score }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                {{ $result->exam_score }}
                            </td>

                            <td class="px-4 py-3 text-center font-bold">
                                {{ $result->total_score }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                {{ $result->grade }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                {{ $result->remark }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-500">
                                No results available.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if($results->count())
            <div class="mt-6 text-right">
                <a href="{{ route('student.report-card') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
                    View Report Card
                </a>
            </div>
        @endif

    </div>

</x-app-layout>