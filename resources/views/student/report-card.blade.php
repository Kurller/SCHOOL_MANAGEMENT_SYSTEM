<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            My Report Card
        </h2>
    </x-slot>

    @include('report-cards._report-card', [
        'student' => $student,
        'results' => $results,
        'setting' => $setting,
        'average' => $average,
        'backRoute' => route('student.results.index')
    ])

</x-app-layout>