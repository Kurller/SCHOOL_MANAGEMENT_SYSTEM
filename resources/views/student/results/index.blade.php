<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            My Results
        </h2>
    </x-slot>

    <div class="py-6 min-h-screen bg-gradient-to-br from-violet-100 via-fuchsia-100 to-pink-100">
        <div class="max-w-7xl mx-auto">

            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">

                <div class="overflow-x-auto">
                    <table class="min-w-full">

                        <thead class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white">

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

                                <tr class="border-b border-gray-100 hover:bg-fuchsia-50 transition-colors">

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

            </div>

            @if($results->count())
                <div class="mt-6 text-right">
                    <a href="{{ route('student.report-card') }}"
                       class="bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white px-6 py-3 rounded-lg font-medium transition-colors shadow-md">
                        View Report Card
                    </a>
                </div>
            @endif

        </div>
    </div>

</x-app-layout>