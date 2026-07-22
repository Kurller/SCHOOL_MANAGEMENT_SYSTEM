<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600 leading-tight">
            Teacher Details
        </h2>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-violet-100 via-fuchsia-100 to-pink-100 min-h-screen">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden">

                <!-- Header -->
                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white px-6 py-4">
                    <h3 class="text-2xl font-bold">
                        {{ $teacher->first_name }} {{ $teacher->last_name }}
                    </h3>
                </div>

                <div class="p-8">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                        <!-- Photo -->
                        <div class="text-center">

                            @if($teacher->photo)
                                <img src="{{ asset('storage/'.$teacher->photo) }}"
                                     alt="Teacher Photo"
                                     class="w-56 h-56 object-cover rounded-lg shadow border mx-auto transition-transform duration-300 hover:scale-105">
                            @else
                                <img src="https://via.placeholder.com/220x220?text=No+Photo"
                                     class="w-56 h-56 rounded-lg shadow border mx-auto transition-transform duration-300 hover:scale-105">
                            @endif

                        </div>

                        <!-- Details -->
                        <div class="md:col-span-2">

                            <table class="w-full">

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold w-56 text-gray-700">Teacher ID</td>
                                    <td>{{ $teacher->teacher_id }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Staff Number</td>
                                    <td>{{ $teacher->staff_number }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">First Name</td>
                                    <td>{{ $teacher->first_name }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Last Name</td>
                                    <td>{{ $teacher->last_name }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Date of Birth</td>
                                    <td>{{ $teacher->date_of_birth }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Gender</td>
                                    <td>{{ $teacher->gender }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Phone</td>
                                    <td>{{ $teacher->phone }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Email</td>
                                    <td>{{ $teacher->email }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Qualification</td>
                                    <td>{{ $teacher->qualification }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Specialization</td>
                                    <td>{{ $teacher->specialization ?? 'N/A' }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Employment Date</td>
                                    <td>{{ $teacher->employment_date }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Salary</td>
                                    <td>
                                        @if($teacher->salary)
                                            ₦{{ number_format($teacher->salary,2) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Address</td>
                                    <td>{{ $teacher->address }}</td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <td class="py-3 font-bold text-gray-700">Status</td>
                                    <td>
                                        @if($teacher->status == 'Active')
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-medium">
                                                Active
                                            </span>
                                        @else
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full font-medium">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="py-3 font-bold text-gray-700">Created At</td>
                                    <td>{{ $teacher->created_at->format('d M Y') }}</td>
                                </tr>

                            </table>

                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="mt-8 flex gap-3">

                        <a href="{{ route('teachers.edit', $teacher) }}"
                           class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-5 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            Edit Teacher
                        </a>

                        <a href="{{ route('teachers.index') }}"
                           class="bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 text-white px-5 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            Back to Teachers
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>
