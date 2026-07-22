<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Class Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6">

                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white rounded-2xl shadow-lg p-6 mb-6">
                    <h3 class="text-2xl font-bold">{{ $class->class_name }}</h3>
                    <p class="text-white/90 mt-1">{{ $class->class_code }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <p class="text-sm font-semibold text-violet-600">Class Name</p>
                        <p class="text-gray-800 dark:text-gray-100">{{ $class->class_name }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-violet-600">Class Code</p>
                        <p class="text-gray-800 dark:text-gray-100">{{ $class->class_code }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-violet-600">Level</p>
                        <p class="text-gray-800 dark:text-gray-100">{{ $class->level }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-violet-600">Status</p>
                        <p class="text-gray-800 dark:text-gray-100">{{ $class->status }}</p>
                    </div>

                    <div class="col-span-2">
                        <p class="text-sm font-semibold text-violet-600">Description</p>
                        <p class="text-gray-800 dark:text-gray-100">{{ $class->description }}</p>
                    </div>

                </div>

                <div class="mt-6 flex gap-2">

                    <a href="{{ route('classes.edit',$class) }}"
                       class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-4 py-2 rounded-lg shadow transition duration-200 transform hover:scale-105">
                        Edit
                    </a>

                    <a href="{{ route('classes.index') }}"
                       class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-4 py-2 rounded-lg shadow transition duration-200 transform hover:scale-105">
                        Back
                    </a>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
