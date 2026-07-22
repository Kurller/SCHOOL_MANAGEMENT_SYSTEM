<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600 leading-tight">
            Student Enrollments
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">

                <form method="GET"
                      action="{{ route('enrollments.index') }}"
                      class="flex gap-2">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search student..."
                        class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-violet-500 transition">

                    <button
                        class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white px-4 py-2 rounded-lg transition shadow-md">
                        Search
                    </button>

                </form>

                <a href="{{ route('enrollments.create') }}"
                   class="bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white px-4 py-2 rounded-lg transition shadow-md">
                    Enroll Student
                </a>

            </div>

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white px-6 py-4">
                    <h3 class="text-lg font-semibold">Student Enrollments</h3>
                </div>
                <div class="p-6">
                    <table class="min-w-full">

                        <thead class="bg-gray-50">

                        <tr>
                            <th class="border p-3">Student ID</th>
                            <th class="border p-3">Student</th>
                            <th class="border p-3">Class</th>
                            <th class="border p-3">Session</th>
                            <th class="border p-3">Status</th>
                            <th class="border p-3">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($enrollments as $enrollment)

                            <tr>

                                <td class="border p-3">
                                    {{ $enrollment->student->student_id }}
                                </td>

                                <td class="border p-3">
                                    {{ $enrollment->student->first_name }}
                                    {{ $enrollment->student->last_name }}
                                </td>

                                <td class="border p-3">
                                    {{ $enrollment->schoolClass->class_name }}
                                </td>

                                <td class="border p-3">
                                    {{ $enrollment->academic_session }}
                                </td>

                                <td class="border p-3">
                                    {{ $enrollment->status }}
                                </td>

                                <td class="border p-3">

                                    <a href="{{ route('enrollments.edit',$enrollment) }}"
                                       class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-3 py-1 rounded-lg transition shadow-sm text-sm font-medium mr-3">
                                        Edit
                                    </a>

                                    <form action="{{ route('enrollments.destroy',$enrollment) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Delete enrollment?')"
                                            class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white px-3 py-1 rounded-lg transition shadow-sm text-sm font-medium">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="text-center p-5">
                                    No enrollments found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
            </div>

            <div class="mt-5">
                {{ $enrollments->links() }}
            </div>

        </div>
    </div>
</x-app-layout>