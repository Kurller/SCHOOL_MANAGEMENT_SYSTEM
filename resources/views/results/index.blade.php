<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
                Results
            </h2>

            <a href="{{ route('results.create') }}"
               class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white px-4 py-2 rounded-lg font-medium transition-colors shadow-md">
                + Add Result
            </a>
        </div>
    </x-slot>

    <div class="py-6 min-h-screen bg-gradient-to-br from-violet-100 via-fuchsia-100 to-pink-100">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="bg-gradient-to-r from-emerald-100 to-teal-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-lg mb-4 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white">
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
                                <tr class="border-b border-gray-100 hover:bg-fuchsia-50 transition-colors">

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
                                           class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-3 py-1 rounded-lg mr-1 inline-block shadow-sm transition-colors">
                                            View
                                        </a>

                                        <a href="{{ route('results.edit', $result) }}"
                                           class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-3 py-1 rounded-lg mr-1 inline-block shadow-sm transition-colors">
                                            Edit
                                        </a>

                                        <a href="{{ route('report-cards.show', $result->student_id) }}"
                                           class="bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white px-3 py-1 rounded-lg mr-1 inline-block shadow-sm transition-colors">
                                            Report Card
                                        </a>

                                        <form action="{{ route('results.destroy', $result) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Delete this result?')"
                                                    class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white px-3 py-1 rounded-lg shadow-sm transition-colors">
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

            </div>

            <div class="mt-4">
                {{ $results->links() }}
            </div>

        </div>
    </div>
</x-app-layout>