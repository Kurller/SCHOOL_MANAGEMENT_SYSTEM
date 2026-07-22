<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl sm:text-2xl font-bold text-violet-700">
            Student Dashboard
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        {{-- Welcome --}}
        <div class="bg-gradient-to-r from-violet-700 to-fuchsia-600 text-white rounded-xl p-6 mb-6 shadow">
            <h2 class="text-2xl font-bold">
                Welcome, {{ auth()->user()->name }}
            </h2>

            <p class="mt-2 text-violet-100">
                View your academic records, attendance and report cards.
            </p>
        </div>

        {{-- Statistics --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-gray-500 text-sm">
                    Subjects
                </p>

                <h3 class="text-3xl font-bold text-violet-700 mt-2">
                    {{ $subjects ?? 0 }}
                </h3>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-gray-500 text-sm">
                    Average Score
                </p>

                <h3 class="text-3xl font-bold text-green-600 mt-2">
                    {{ $average ?? 0 }}%
                </h3>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-gray-500 text-sm">
                    Attendance
                </p>

                <h3 class="text-3xl font-bold text-blue-600 mt-2">
                    {{ $attendance ?? 0 }}%
                </h3>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-gray-500 text-sm">
                    Outstanding Fees
                </p>

                <h3 class="text-3xl font-bold text-red-600 mt-2">
                    ₦{{ number_format($balance ?? 0) }}
                </h3>
            </div>

        </div>

        {{-- Quick Actions --}}
        <div class="bg-white rounded-xl shadow mt-8 p-6">

            <h3 class="text-lg font-bold mb-5">
                Quick Actions
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <a href="{{ route('student.results.index') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-3 text-center transition">

                    My Results

                </a>

                <a href="{{ route('student.attendances.index') }}"
                    class="bg-green-600 hover:bg-green-700 text-white rounded-lg py-3 text-center transition">

                    Attendance

                </a>

                <a href="{{ route('student.report-cards.index') }}"
                    class="bg-purple-600 hover:bg-purple-700 text-white rounded-lg py-3 text-center transition">

                    Report Cards

                </a>

                <a href="{{ route('student.fees.index') }}"
                    class="bg-orange-600 hover:bg-orange-700 text-white rounded-lg py-3 text-center transition">

                    Fees

                </a>

            </div>

        </div>

    </div>

</x-app-layout>