<x-app-layout>

<div class="space-y-8">

    <!-- Welcome -->
    <div class="bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-xl shadow-lg p-6 text-white">

        <h1 class="text-3xl font-bold">
            Welcome Back,
            {{ Auth::user()->name }}
        </h1>

        <p class="mt-2 text-violet-100">
            Manage your school from one place.
        </p>

    </div>

    <!-- Statistics -->

    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500">Students</h3>
            <p class="text-3xl font-bold text-blue-600">
                {{ $students }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500">Teachers</h3>
            <p class="text-3xl font-bold text-green-600">
                {{ $teachers }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500">Classes</h3>
            <p class="text-3xl font-bold text-purple-600">
                {{ $classes }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500">Subjects</h3>
            <p class="text-3xl font-bold text-orange-600">
                {{ $subjects }}
            </p>
        </div>

    </div>

    <!-- Quick Actions -->

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-xl font-bold mb-5">
            Quick Actions
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

            <a href="{{ route('students.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg p-4 text-center">

                Add Student

            </a>

            <a href="{{ route('teachers.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white rounded-lg p-4 text-center">

                Add Teacher

            </a>

            <a href="{{ route('attendances.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white rounded-lg p-4 text-center">

                Take Attendance

            </a>

            <a href="{{ route('results.create') }}"
               class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-4 text-center">

                Enter Result

            </a>

        </div>

    </div>

</div>

</x-app-layout>