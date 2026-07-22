<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-blue-900">
            Reports Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Students -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-semibold">Students</h3>
                    <p class="text-4xl font-bold mt-3">{{ $students }}</p>
                </div>

                <!-- Teachers -->
                <div class="bg-gradient-to-r from-green-500 to-green-700 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-semibold">Teachers</h3>
                    <p class="text-4xl font-bold mt-3">{{ $teachers }}</p>
                </div>

                <!-- Classes -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-700 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-semibold">Classes</h3>
                    <p class="text-4xl font-bold mt-3">{{ $classes }}</p>
                </div>

                <!-- Subjects -->
                <div class="bg-gradient-to-r from-orange-500 to-orange-700 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-semibold">Subjects</h3>
                    <p class="text-4xl font-bold mt-3">{{ $subjects }}</p>
                </div>

                <!-- Present -->
                <div class="bg-gradient-to-r from-pink-500 to-pink-700 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-semibold">Present</h3>
                    <p class="text-4xl font-bold mt-3">{{ $present }}</p>
                </div>

                <!-- Absent -->
                <div class="bg-gradient-to-r from-red-500 to-red-700 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-semibold">Absent</h3>
                    <p class="text-4xl font-bold mt-3">{{ $absent }}</p>
                </div>

                <!-- Results -->
                <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-semibold">Results</h3>
                    <p class="text-4xl font-bold mt-3">{{ $results }}</p>
                </div>

                <!-- Fees Collected -->
                <div class="bg-gradient-to-r from-emerald-500 to-emerald-700 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-semibold">Fees Collected</h3>
                    <p class="text-3xl font-bold mt-3">
                        ₦{{ number_format($feesCollected, 2) }}
                    </p>
                </div>

                <!-- Total Fees Expected -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-blue-500">
                    <h3 class="text-lg font-semibold text-gray-700">
                        Total Fees Expected
                    </h3>

                    <p class="text-3xl font-bold text-blue-600 mt-3">
                        ₦{{ number_format($feesExpected, 2) }}
                    </p>
                </div>

                <!-- Outstanding Fees -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-red-500">
                    <h3 class="text-lg font-semibold text-gray-700">
                        Outstanding Fees
                    </h3>

                    <p class="text-3xl font-bold text-red-600 mt-3">
                        ₦{{ number_format($outstandingFees, 2) }}
                    </p>
                </div>

                <!-- System Status -->
                <div class="bg-gradient-to-r from-teal-500 to-teal-700 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-semibold">System Status</h3>
                    <p class="text-2xl font-bold mt-3">
                        Running
                    </p>
                </div>

            </div>

            <!-- Quick Reports -->
            <div class="mt-10 bg-white rounded-xl shadow-lg p-8">

                <h3 class="text-xl font-bold mb-6 text-gray-700">
                    Quick Reports
                </h3>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                    <a href="{{ route('report-cards.index') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg p-4 text-center font-semibold">
                        Student Report Card
                    </a>

                    <a href="{{ route('results.index') }}"
                       class="bg-green-600 hover:bg-green-700 text-white rounded-lg p-4 text-center font-semibold">
                        Class Results
                    </a>

                    <a href="{{ route('attendances.index') }}"
                       class="bg-purple-600 hover:bg-purple-700 text-white rounded-lg p-4 text-center font-semibold">
                        Attendance Report
                    </a>

                    <a href="{{ route('fees.index') }}"
                       class="bg-orange-600 hover:bg-orange-700 text-white rounded-lg p-4 text-center font-semibold">
                        Fee Report
                    </a>

                    <a href="{{ route('teachers.index') }}"
                       class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-4 text-center font-semibold">
                        Teacher Report
                    </a>

                    <a href="{{ route('results.index') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg p-4 text-center font-semibold">
                        Performance Analysis
                    </a>

                    <a href="{{ route('reports.export.pdf') }}"
   class="bg-pink-600 hover:bg-pink-700 text-white rounded-lg p-4 text-center font-semibold">
    PDF Reports
</a>

<a href="{{ route('reports.export.excel') }}"
   class="bg-gray-700 hover:bg-black text-white rounded-lg p-4 text-center font-semibold">
    Export Excel
</a>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>