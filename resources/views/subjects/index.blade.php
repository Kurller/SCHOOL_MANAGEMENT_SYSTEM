<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Subjects
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between mb-4">

                <form method="GET" action="{{ route('subjects.index') }}" class="flex gap-2">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search Subject..."
                        class="border rounded p-2">

                    <button class="bg-green-600 text-white px-4 rounded">
                        Search
                    </button>

                </form>

                <a href="{{ route('subjects.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded">
                    Add Subject
                </a>

            </div>

            <div class="bg-gradient-to-r from-blue-500 to-indigo-700 text-white rounded-xl shadow-lg p-6">
                <table class="min-w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="p-3 border">Code</th>

                            <th class="p-3 border">Subject</th>

                            <th class="p-3 border">Status</th>

                            <th class="p-3 border">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($subjects as $subject)

                            <tr>

                                <td class="border p-3">
                                    {{ $subject->subject_code }}
                                </td>

                                <td class="border p-3">
                                    {{ $subject->subject_name }}
                                </td>

                                <td class="border p-3">
                                    {{ $subject->status }}
                                </td>

                                <td class="border p-3">

                                    <a href="{{ route('subjects.edit', $subject) }}"
                                       class="text-blue-600 mr-3">
                                        Edit
                                    </a>

                                    <form action="{{ route('subjects.destroy',$subject) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Delete this subject?')"
                                            class="text-red-600">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center p-4">

                                    No subjects found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-5">

                {{ $subjects->links() }}

            </div>

        </div>
    </div>
</x-app-layout>