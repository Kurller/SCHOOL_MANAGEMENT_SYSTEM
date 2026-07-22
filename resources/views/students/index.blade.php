<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Students
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-gradient-to-r from-emerald-100 to-teal-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded mb-4 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white p-6">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold">Students</h3>

                        <a href="{{ route('students.create') }}"
                            class="bg-white text-fuchsia-600 hover:bg-yellow-300 hover:text-fuchsia-700 px-4 py-2 rounded-lg font-semibold transition-colors shadow-lg">
                            Add Student
                        </a>
                    </div>
                </div>

                <div class="p-6 bg-white/50">
                    <form method="GET" action="{{ route('students.index') }}" class="mb-4">
                        <div class="flex gap-2">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search by ID, name or email..."
                                class="border border-gray-300 rounded-lg w-full p-2 focus:ring-2 focus:ring-fuchsia-500 focus:border-transparent outline-none">

                            <button
                                type="submit"
                                class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white px-5 rounded-lg font-medium transition-colors shadow-md">
                                Search
                            </button>

                            <a href="{{ route('students.index') }}"
                               class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-5 py-2 rounded-lg font-medium transition-colors shadow-md">
                                Reset
                            </a>
                        </div>
                    </form>

                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-full">

                            <thead class="bg-gradient-to-r from-violet-500 to-fuchsia-500 text-white">
                                <tr>
                                    <th class="border px-4 py-3">Photo</th>
                                    <th class="border px-4 py-3">Student ID</th>
                                    <th class="border px-4 py-3">Name</th>
                                    <th class="border px-4 py-3">Gender</th>
                                    <th class="border px-4 py-3">Email</th>
                                    <th class="border px-4 py-3">Status</th>
                                    <th class="border px-4 py-3 text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($students as $student)
                                    <tr class="hover:bg-fuchsia-50 transition-colors border-b border-gray-100">

                                        <td class="border px-4 py-2 text-center">
                                            @if($student->photo)
                                                <img src="{{ asset('storage/' . $student->photo) }}"
                                                     alt="Student Photo"
                                                     class="w-16 h-16 rounded-full object-cover mx-auto ring-4 ring-fuchsia-200">
                                            @else
                                                <span class="text-gray-400">No Photo</span>
                                            @endif
                                        </td>

                                        <td class="border px-4 py-2 font-medium text-gray-700">
                                            {{ $student->student_id }}
                                        </td>

                                        <td class="border px-4 py-2">
                                            {{ $student->first_name }} {{ $student->last_name }}
                                        </td>

                                        <td class="border px-4 py-2">
                                            {{ $student->gender }}
                                        </td>

                                        <td class="border px-4 py-2">
                                            {{ $student->email }}
                                        </td>

                                        <td class="border px-4 py-2">
                                            @if($student->status == 'Active')
                                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Active</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Inactive</span>
                                            @endif
                                        </td>

                                        <td class="border px-4 py-2 text-center">

                                            <a href="{{ route('students.show', $student) }}"
        class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-3 py-1 rounded-lg mr-2 inline-block shadow-sm transition-colors">
        View
    </a>

    <a href="{{ route('students.edit', $student) }}"
        class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-3 py-1 rounded-lg mr-2 inline-block shadow-sm transition-colors">
        Edit
    </a>

                                            <form action="{{ route('students.destroy', $student) }}"
                                                  method="POST"
                                                  class="inline">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this student?')"
                                                    class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white px-3 py-1 rounded-lg shadow-sm transition-colors">
                                                    Delete
                                                </button>

                                            </form>

                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="border px-4 py-4 text-center text-gray-500">
                                            No students found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $students->appends(request()->query())->links() }}
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>