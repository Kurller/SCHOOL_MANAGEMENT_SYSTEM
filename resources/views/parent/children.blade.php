<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            My Children
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8">

        <div class="bg-white rounded-xl shadow overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-violet-700 text-white">

                    <tr>
                        <th class="px-4 py-3 text-left">Admission No</th>
                        <th class="px-4 py-3 text-left">Student Name</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($students as $student)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-4 py-3">
                                {{ $student->admission_number }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $student->first_name }}
                                {{ $student->last_name }}
                            </td>

                            <td class="px-4 py-3 text-center">

                                <a href="{{ route('parent.report-card', ['student' => $student->id]) }}"
                                   class="inline-block bg-violet-600 hover:bg-violet-700 text-white px-4 py-2 rounded-lg">
                                    View Report Card
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="text-center py-6 text-gray-500">
                                No child has been linked to this parent.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>