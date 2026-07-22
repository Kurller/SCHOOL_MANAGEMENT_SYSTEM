<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Assignment Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6">

            <p><strong>Class:</strong> {{ $classSubject->schoolClass->class_name }}</p>

            <p><strong>Subject:</strong> {{ $classSubject->subject->subject_name }}</p>

            <p><strong>Teacher:</strong>
                {{ $classSubject->teacher->first_name }}
                {{ $classSubject->teacher->last_name }}
            </p>

            <a href="{{ route('class-subjects.index') }}"
               class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
                Back
            </a>

        </div>
    </div>
</x-app-layout>