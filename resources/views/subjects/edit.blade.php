<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Edit Subject
        </h2>
    </x-slot>

    <div class="py-6 min-h-screen bg-gradient-to-br from-violet-100 via-fuchsia-100 to-pink-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">

                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white p-6">
                    <h3 class="text-xl font-bold">Edit Subject</h3>
                </div>

                <div class="p-6">

                    @if ($errors->any())
                        <div class="mb-4 bg-gradient-to-r from-red-100 to-rose-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('subjects.update', $subject) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">

                            <!-- Subject Name -->
                            <div class="col-span-2">
                                <label class="block font-medium text-gray-700 mb-1">Subject Name</label>
                                <input
                                    type="text"
                                    name="subject_name"
                                    value="{{ old('subject_name', $subject->subject_name) }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Subject Code -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Subject Code</label>
                                <input
                                    type="text"
                                    name="subject_code"
                                    value="{{ old('subject_code', $subject->subject_code) }}"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Status</label>

                                <select name="status" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">

                                    <option value="Active"
                                        {{ old('status', $subject->status) == 'Active' ? 'selected' : '' }}>
                                        Active
                                    </option>

                                    <option value="Inactive"
                                        {{ old('status', $subject->status) == 'Inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>

                                </select>
                            </div>

                            <!-- Description -->
                            <div class="col-span-2">
                                <label class="block font-medium text-gray-700 mb-1">Description</label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">{{ old('description', $subject->description) }}</textarea>
                            </div>

                        </div>

                        <div class="mt-6 flex gap-3">

                            <button
                                type="submit"
                                class="bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white px-6 py-2 rounded-lg font-semibold shadow-lg transition-all">
                                Update Subject
                            </button>

                            <a href="{{ route('subjects.index') }}"
                               class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>