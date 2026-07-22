<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Subject
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('subjects.store') }}" method="POST">

                    @csrf

                    <div class="grid grid-cols-2 gap-4">

                        <!-- Subject Name -->
                        <div class="col-span-2">
                            <label class="block font-medium">Subject Name</label>
                            <input
                                type="text"
                                name="subject_name"
                                value="{{ old('subject_name') }}"
                                class="w-full border rounded p-2"
                                placeholder="e.g Mathematics">
                        </div>

                        <!-- Subject Code -->
                        <div>
                            <label class="block font-medium">Subject Code</label>
                            <input
                                type="text"
                                name="subject_code"
                                value="{{ old('subject_code') }}"
                                class="w-full border rounded p-2"
                                placeholder="e.g MTH101">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block font-medium">Status</label>

                            <select
                                name="status"
                                class="w-full border rounded p-2">

                                <option value="Active"
                                    {{ old('status') == 'Active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="Inactive"
                                    {{ old('status') == 'Inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-span-2">
                            <label class="block font-medium">Description</label>

                            <textarea
                                name="description"
                                rows="5"
                                class="w-full border rounded p-2"
                                placeholder="Brief description of the subject...">{{ old('description') }}</textarea>
                        </div>

                    </div>

                    <div class="mt-6 flex gap-3">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                            Save Subject
                        </button>

                        <a href="{{ route('subjects.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>