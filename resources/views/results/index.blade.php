<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-white">
                Results
            </h2>

            <a href="{{ route('results.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                + Add Result
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg overflow-hidden">

                <table class="w-full border-collapse">
                    <thead class="bg-blue-700 text-white">
                        <tr>
                            <th class="p-3 text-left">Student</th>
                            <th class="p-3 text-left">Class</th>
                            <th class="p-3 text-left">Subject</th>
                            <th class="p-3 text-center">CA</th>
                            <th class="p-3 text-center">Exam</th>
                            <th class="p-3 text-center">Total</th>
                            <th class="p-3 text-center">Grade</th>
                            <th class="p-3 text-center">Remark</th>
                            <th class="p-3 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($results as $result)
                            <tr class="border-b hover:bg-gray-100">

                                <td class="p-3">
                                    {{ $result->student->first_name }}
                                    {{ $result->student->last_name }}
                                </td>

                                <td class="p-3">
                                    {{ $result->schoolClass->class_name }}
                                </td>

                                <td class="p-3">
                                    {{ $result->subject->subject_name }}
                                </td>

                                <td class="text-center">
                                    {{ $result->ca_score }}
                                </td>

                                <td class="text-center">
                                    {{ $result->exam_score }}
                                </td>

                                <td class="text-center font-bold">
                                    {{ $result->total_score }}
                                </td>

                                <td class="text-center font-bold">
                                    {{ $result->grade }}
                                </td>

                                <td class="text-center">
                                    {{ $result->remark }}
                                </td>

                                <td class="text-center whitespace-nowrap">

                                    <a href="{{ route('results.show', $result) }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                        View
                                    </a>

                                    <a href="{{ route('results.edit', $result) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <a href="{{ route('report-cards.show', $result->student_id) }}"
                                       class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                        Report Card
                                    </a>

                                    <form action="{{ route('results.destroy', $result) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Delete this result?')"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                            Delete
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-8 text-gray-500">
                                    No results found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

            <div class="mt-4">
                {{ $results->links() }}
            </div>

        </div>
    </div>
</x-app-layout>