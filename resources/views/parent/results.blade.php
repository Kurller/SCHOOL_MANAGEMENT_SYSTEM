<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            Children's Results
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8">

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-violet-700 text-white">

                    <tr>

                        <th class="px-4 py-3">Student</th>
                        <th class="px-4 py-3">Subject</th>
                        <th class="px-4 py-3">CA</th>
                        <th class="px-4 py-3">Exam</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Grade</th>
                        <th class="px-4 py-3">Remark</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($results ?? [] as $result)

                        <tr class="border-b">

                            <td class="px-4 py-3">
                                {{ $result->student->first_name }}
                                {{ $result->student->last_name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $result->subject->subject_name }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                {{ $result->ca_score }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                {{ $result->exam_score }}
                            </td>

                            <td class="px-4 py-3 text-center">
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

                            <td colspan="7" class="text-center py-8">
                                No results available.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>