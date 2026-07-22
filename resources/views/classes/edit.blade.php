<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Edit Class
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6">

                <form action="{{ route('classes.update',$class) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label>Class Name</label>

                            <input
                                type="text"
                                name="class_name"
                                value="{{ old('class_name',$class->class_name) }}"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">
                        </div>

                        <div>
                            <label>Class Code</label>

                            <input
                                type="text"
                                name="class_code"
                                value="{{ old('class_code',$class->class_code) }}"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">
                        </div>

                        <div>
                            <label>Level</label>

                            <select name="level" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">

                                <option value="Nursery" {{ $class->level=='Nursery'?'selected':'' }}>Nursery</option>
                                <option value="Primary" {{ $class->level=='Primary'?'selected':'' }}>Primary</option>
                                <option value="Junior" {{ $class->level=='Junior'?'selected':'' }}>Junior</option>
                                <option value="Senior" {{ $class->level=='Senior'?'selected':'' }}>Senior</option>

                            </select>

                        </div>

                        <div>
                            <label>Status</label>

                            <select name="status" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">

                                <option value="Active" {{ $class->status=='Active'?'selected':'' }}>Active</option>

                                <option value="Inactive" {{ $class->status=='Inactive'?'selected':'' }}>Inactive</option>

                            </select>

                        </div>

                        <div class="col-span-2">

                            <label>Description</label>

                            <textarea
                                name="description"
                                rows="4"
                                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition">{{ old('description',$class->description) }}</textarea>

                        </div>

                    </div>

                    <button
                        class="mt-6 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 hover:from-violet-700 hover:via-fuchsia-700 hover:to-pink-700 text-white px-6 py-2 rounded-lg shadow transition duration-200 transform hover:scale-105">

                        Update Class

                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>