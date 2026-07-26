<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl sm:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Student Dashboard
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        {{-- Welcome --}}
        <div class="bg-gradient-to-r from-violet-700 via-fuchsia-600 to-pink-600 text-white rounded-xl p-6 mb-6 shadow-xl transition hover:shadow-2xl">
            <h2 class="text-2xl font-bold">
                Welcome, {{ auth()->user()->name }}
            </h2>

            <p class="mt-2 text-violet-100">
                View your academic records, attendance and report cards.
            </p>
        </div>

        {{-- Statistics --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-5 transition hover:shadow-2xl hover:scale-105">
                <p class="text-gray-500 text-sm">
                    Subjects
                </p>

                <h3 class="text-3xl font-bold text-violet-700 mt-2">
                    {{ $subjects ?? 0 }}
                </h3>
            </div>

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-5 transition hover:shadow-2xl hover:scale-105">
                <p class="text-gray-500 text-sm">
                    Average Score
                </p>

                <h3 class="text-3xl font-bold text-green-600 mt-2">
                    {{ $average ?? 0 }}%
                </h3>
            </div>

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-5 transition hover:shadow-2xl hover:scale-105">
                <p class="text-gray-500 text-sm">
                    Attendance
                </p>

                <h3 class="text-3xl font-bold text-blue-600 mt-2">
                    {{ $attendance ?? 0 }}%
                </h3>
            </div>

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-5 transition hover:shadow-2xl hover:scale-105">
                <p class="text-gray-500 text-sm">
                    Outstanding Fees
                </p>

                <h3 class="text-3xl font-bold text-red-600 mt-2">
                    ₦{{ number_format($balance ?? 0) }}
                </h3>
            </div>

        </div>

        {{-- Quick Actions --}}
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl mt-8 p-6 transition hover:shadow-2xl">

            <h3 class="text-lg font-bold mb-5 text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
                Quick Actions
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <a href="{{ route('student.results.index') }}"
                    class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg py-3 text-center shadow transition transform hover:scale-105">

                    My Results

                </a>

                <a href="{{ route('student.attendances.index') }}"
                    class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white rounded-lg py-3 text-center shadow transition transform hover:scale-105">

                    Attendance

                </a>

                <a href="{{ route('student.report-cards.index') }}"
                    class="bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-lg py-3 text-center shadow transition transform hover:scale-105">

                    Report Cards

                </a>

                <a href="{{ route('student.fees.index') }}"
                    class="bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800 text-white rounded-lg py-3 text-center shadow transition transform hover:scale-105">

                    Fees

                </a>

            </div>

        </div>

    </div>

</x-app-layout>