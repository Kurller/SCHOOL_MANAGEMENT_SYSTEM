<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-violet-700">
                User Management
            </h2>

            <a href="{{ route('users.create') }}"
               class="bg-violet-600 hover:bg-violet-700 text-white px-4 py-2 rounded-lg">
                + New User
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8">

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-violet-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Role</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $user->role->name ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-center">

                            <a href="{{ route('users.edit',$user) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                Edit
                            </a>

                            <form action="{{ route('users.destroy',$user) }}"
                                  method="POST"
                                  class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete this user?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center py-8">
                            No users found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>

    </div>

</x-app-layout>