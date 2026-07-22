<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Attendance
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 px-6 py-4 flex justify-between items-center">
                    <h3 class="text-xl font-bold text-white">Attendance Records</h3>

                    <a href="{{ route('attendances.create') }}"
                       class="bg-white/90 hover:bg-white text-fuchsia-700 font-semibold px-4 py-2 rounded-lg shadow transition duration-200 hover:scale-105">
                        Mark Attendance
                    </a>
                </div>

                <div class="p-6">

                    <form method="GET" action="{{ route('attendances.index') }}" class="mb-6">

                        <div class="grid grid-cols-1 md:grid-cols-5 gap-3">

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Student Name/ID"
                                class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">

                            <select
                                name="class"
                                class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">

                                <option value="">All Classes</option>

                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}"
                                        {{ request('class')==$class->id ? 'selected':'' }}>
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach

                            </select>

                            <input
                                type="date"
                                name="date"
                                value="{{ request('date') }}"
                                class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200">

                            <button
                                class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-semibold rounded-lg px-4 py-2 shadow hover:shadow-lg transition duration-200 hover:scale-105">
                                Search
                            </button>

                            <a href="{{ route('attendances.index') }}"
                               class="bg-gradient-to-r from-gray-400 to-gray-500 text-white font-semibold rounded-lg px-4 py-2 shadow hover:shadow-lg transition duration-200 hover:scale-105 text-center">
                                Reset
                            </a>

                        </div>

                    </form>

                    <div class="overflow-x-auto rounded-xl shadow">
                        <table class="min-w-full">

                            <thead class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white">

                                <tr>
                                    <th class="p-3 text-left">Student</th>
                                    <th class="p-3 text-left">Class</th>
                                    <th class="p-3 text-left">Date</th>
                                    <th class="p-3 text-left">Status</th>
                                    <th class="p-3 text-left">Actions</th>
                                </tr>

                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                @forelse($attendances as $attendance)

                                <tr class="hover:bg-violet-50 transition duration-150">

                                    <td class="p-3">
                                        {{ $attendance->student->first_name }}
                                        {{ $attendance->student->last_name }}
                                    </td>

                                    <td class="p-3">
                                        {{ $attendance->schoolClass->class_name }}
                                    </td>

                                    <td class="p-3">
                                        {{ $attendance->attendance_date }}
                                    </td>

                                    <td class="p-3">
                                        {{ $attendance->status }}
                                    </td>

                                    <td class="p-3">

                                        <div class="flex items-center gap-2">

                                            <a href="{{ route('attendances.edit',$attendance) }}"
                                               class="bg-gradient-to-r from-amber-500 to-orange-500 text-white text-sm font-semibold px-3 py-1.5 rounded-lg shadow hover:shadow-lg transition duration-200 hover:scale-105">
                                                Edit
                                            </a>

                                            <form action="{{ route('attendances.destroy',$attendance) }}"
                                                  method="POST"
                                                  class="inline">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    onclick="return confirm('Delete attendance?')"
                                                    class="bg-gradient-to-r from-rose-500 to-pink-500 text-white text-sm font-semibold px-3 py-1.5 rounded-lg shadow hover:shadow-lg transition duration-200 hover:scale-105">
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="5" class="text-center p-4 text-gray-500">
                                        No attendance records found.
                                    </td>
                                </tr>

                                @endforelse

                            </tbody>

                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $attendances->links() }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
