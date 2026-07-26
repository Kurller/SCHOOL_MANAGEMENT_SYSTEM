<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            My Children
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8">

        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-x-auto transition hover:shadow-2xl">

            <table class="min-w-full">

                <thead class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white">

                    <tr>
                        <th class="px-4 py-3 text-left">Admission No</th>
                        <th class="px-4 py-3 text-left">Student Name</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($students as $student)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="px-4 py-3">
                                {{ $student->admission_number }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $student->first_name }}
                                {{ $student->last_name }}
                            </td>

                            <td class="px-4 py-3 text-center">

                                <a href="{{ route('parent.report-card', ['student' => $student->id]) }}"
                                   class="inline-block bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white px-4 py-2 rounded-lg shadow transition transform hover:scale-105">
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