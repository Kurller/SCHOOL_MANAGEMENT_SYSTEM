<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Assignment Details
        </h2>
    </x-slot>

    <div class="py-6 min-h-screen bg-gradient-to-br from-violet-100 via-fuchsia-100 to-pink-100">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">

                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white p-6">
                    <h3 class="text-xl font-bold">Assignment Details</h3>
                </div>

                <div class="p-6">

                    <div class="space-y-3">
                        <p><strong class="text-gray-700">Class:</strong> {{ $classSubject->schoolClass->class_name }}</p>
                        <p><strong class="text-gray-700">Subject:</strong> {{ $classSubject->subject->subject_name }}</p>
                        <p><strong class="text-gray-700">Teacher:</strong> {{ $classSubject->teacher->first_name }} {{ $classSubject->teacher->last_name }}</p>
                    </div>

                    <div class="mt-6 flex gap-3">

                        <a href="{{ route('class-subjects.edit', $classSubject) }}"
                           class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-5 py-2 rounded-lg font-medium transition-colors shadow-md">
                            Edit Assignment
                        </a>

                        <a href="{{ route('class-subjects.index') }}"
                           class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-5 py-2 rounded-lg font-medium transition-colors">
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>