<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Class Subject Assignments
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('class-subjects.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Assign Subject
                </a>
            </div>

            <div class="bg-white shadow rounded-lg overflow-hidden">

                <table class="min-w-full border-collapse">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-3">Class</th>
                            <th class="border p-3">Subject</th>
                            <th class="border p-3">Teacher</th>
                            <th class="border p-3">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($assignments as $assignment)

                            <tr>

                                <td class="border p-3">
                                    {{ $assignment->schoolClass->class_name }}
                                </td>

                                <td class="border p-3">
                                    {{ $assignment->subject->subject_name }}
                                </td>

                                <td class="border p-3">
                                    {{ $assignment->teacher->first_name }}
                                    {{ $assignment->teacher->last_name }}
                                </td>

                                <td class="border p-3">

                                    <a href="{{ route('class-subjects.edit', $assignment) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('class-subjects.destroy', $assignment) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Delete this assignment?')"
                                            class="bg-red-600 text-white px-3 py-1 rounded">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center p-5">
                                    No assignments found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-5">
                {{ $assignments->links() }}
            </div>

        </div>
    </div>
</x-app-layout>