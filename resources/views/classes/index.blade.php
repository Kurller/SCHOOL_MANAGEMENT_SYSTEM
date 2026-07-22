<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600 leading-tight">
            Classes
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded-xl mb-4 shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white rounded-2xl shadow-xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Classes</h3>

                    <a href="{{ route('classes.create') }}"
                       class="bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white px-4 py-2 rounded-lg shadow transition duration-200 transform hover:scale-105">
                        Add Class
                    </a>
                </div>

                <!-- Search -->

                <form method="GET"
                      action="{{ route('classes.index') }}"
                      class="mb-4">

                    <div class="flex gap-2">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search class..."
                            class="border rounded-lg w-full p-2 focus:ring-2 focus:ring-violet-500 transition">

                        <button
                            class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white px-5 rounded-lg shadow transition duration-200 transform hover:scale-105">
                            Search
                        </button>

                        <a href="{{ route('classes.index') }}"
                           class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-5 py-2 rounded-lg shadow transition duration-200 transform hover:scale-105">
                            Reset
                        </a>

                    </div>

                </form>

                <div class="overflow-x-auto">

                    <table class="min-w-full border rounded-lg overflow-hidden">

                        <thead class="bg-white/80 text-violet-700">

                            <tr>

                                <th class="border px-4 py-2">Class Name</th>

                                <th class="border px-4 py-2">Class Code</th>

                                <th class="border px-4 py-2">Level</th>

                                <th class="border px-4 py-2">Status</th>

                                <th class="border px-4 py-2">Actions</th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($classes as $class)

                            <tr>

                                <td class="border px-4 py-2">
                                    {{ $class->class_name }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $class->class_code }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $class->level }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $class->status }}
                                </td>

                                <td class="border px-4 py-2">

                                    <a href="{{ route('classes.show',$class) }}"
                                       class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-3 py-1 rounded-lg shadow transition duration-200 transform hover:scale-105">
                                        View
                                    </a>

                                    <a href="{{ route('classes.edit',$class) }}"
                                       class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-3 py-1 rounded-lg shadow transition duration-200 transform hover:scale-105">

                                        Edit

                                    </a>

                                    <form action="{{ route('classes.destroy',$class) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Delete this class?')"
                                            class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white px-3 py-1 rounded-lg shadow transition duration-200 transform hover:scale-105">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center p-5 text-white/90">

                                    No classes found.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-5">

                    {{ $classes->links() }}

                </div>

            </div>

        </div>
    </div>
</x-app-layout>