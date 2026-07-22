<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            Student Report Card
        </h2>
    </x-slot>

    @include('report-cards._report-card', [
        'student' => $student,
        'results' => $results,
        'setting' => $setting,
        'average' => $average,
        'position' => $position,
        'total' => $total,
        'backRoute' => route('parent.children')
    ])

</x-app-layout>