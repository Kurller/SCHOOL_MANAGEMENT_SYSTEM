<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            My Report Card
        </h2>
    </x-slot>

    @include('report-cards._report-card', [
        'student' => $student,
        'results' => $results,
        'school' => $school,
        'average' => $average,
        'backRoute' => route('student.results.index')
    ])

</x-app-layout>