<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Add Class
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6">

                @if($errors->any())
                    <div class="bg-rose-100 text-rose-700 p-4 rounded-lg mb-4 shadow">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('classes.store') }}" method="POST">

                    @csrf

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label>Class Name</label>
                            <input
                                type="text"
                                name="class_name"
                                value="{{ old('class_name') }}"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">
                        </div>

                        <div>
                            <label>Class Code</label>
                            <input
                                type="text"
                                name="class_code"
                                value="{{ old('class_code') }}"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">
                        </div>

                        <div>
                            <label>Level</label>

                            <select
                                name="level"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">

                                <option value="">Select Level</option>

                                <option value="Nursery">Nursery</option>
                                <option value="Primary">Primary</option>
                                <option value="Junior">Junior</option>
                                <option value="Senior">Senior</option>

                            </select>

                        </div>

                        <div>
                            <label>Status</label>

                            <select
                                name="status"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">

                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>

                            </select>

                        </div>

                        <div class="col-span-2">
                            <label>Description</label>

                            <textarea
                                name="description"
                                rows="4"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">{{ old('description') }}</textarea>

                        </div>

                    </div>

                    <button
                        class="mt-6 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 hover:from-violet-700 hover:via-fuchsia-700 hover:to-pink-700 text-white px-6 py-2 rounded-lg shadow transition duration-200 transform hover:scale-105">
                        Save Class
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>