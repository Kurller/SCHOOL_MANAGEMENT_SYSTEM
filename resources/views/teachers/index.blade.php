<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600 leading-tight">
            Teachers Management
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-all duration-300">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Top Bar -->
            <div class="flex justify-between items-center mb-5">

                <form action="{{ route('teachers.index') }}" method="GET" class="flex gap-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search teacher..."
                        class="border border-gray-300 rounded-lg px-4 py-2 w-72 focus:ring-2 focus:ring-violet-500 transition-all duration-200">

                    <button type="submit"
                            class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white px-5 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                        Search
                    </button>

                    <button type="button"
                            onclick="document.querySelector('input[name=search]').value='';this.form.submit();"
                            class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-5 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                        Reset
                    </button>
                </form>

                <a href="{{ route('teachers.create') }}"
                   class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-5 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                    + Add Teacher
                </a>

            </div>

            <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-white/20">
                            <tr>
                                <th class="border border-white/20 p-3">Photo</th>
                                <th class="border border-white/20 p-3">Teacher ID</th>
                                <th class="border border-white/20 p-3">Name</th>
                                <th class="border border-white/20 p-3">Gender</th>
                                <th class="border border-white/20 p-3">Phone</th>
                                <th class="border border-white/20 p-3">Email</th>
                                <th class="border border-white/20 p-3">Status</th>
                                <th class="border border-white/20 p-3">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse($teachers as $teacher)

                            <tr class="hover:bg-white/10 transition-all duration-200">

                                <td class="border border-gray-200 p-2 text-center">

                                    @if($teacher->photo)

                                        <img src="{{ asset('storage/'.$teacher->photo) }}"
                                             class="w-16 h-16 rounded-full object-cover mx-auto shadow-md">

                                    @else

                                        <img src="https://via.placeholder.com/60"
                                             class="w-16 h-16 rounded-full mx-auto shadow-md">

                                    @endif

                                </td>

                                <td class="border border-gray-200 p-3">{{ $teacher->teacher_id }}</td>

                                <td class="border border-gray-200 p-3">
                                    {{ $teacher->first_name }}
                                    {{ $teacher->last_name }}
                                </td>

                                <td class="border border-gray-200 p-3">{{ $teacher->gender }}</td>

                                <td class="border border-gray-200 p-3">{{ $teacher->phone }}</td>

                                <td class="border border-gray-200 p-3">{{ $teacher->email }}</td>

                                <td class="border border-gray-200 p-3">

                                    @if($teacher->status=='Active')

                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-medium">
                                            Active
                                        </span>

                                    @else

                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full font-medium">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td class="border border-gray-200 p-3">

                                    <div class="flex gap-2">

                                        <a href="{{ route('teachers.show',$teacher) }}"
                                           class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-3 py-1 rounded-lg transition-all duration-200 shadow hover:shadow-md text-sm">
                                            View
                                        </a>

                                        <a href="{{ route('teachers.edit',$teacher) }}"
                                           class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-3 py-1 rounded-lg transition-all duration-200 shadow hover:shadow-md text-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('teachers.destroy',$teacher) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this teacher?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="bg-gradient-to-r from-rose-500 to-pink-600 hover:from-rose-600 hover:to-pink-700 text-white px-3 py-1 rounded-lg transition-all duration-200 shadow hover:shadow-md text-sm">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center py-5 text-gray-600">
                                    No teachers found.
                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="mt-5">
                {{ $teachers->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
