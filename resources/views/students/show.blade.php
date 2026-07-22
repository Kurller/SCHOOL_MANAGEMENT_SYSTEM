<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            Student Details
        </h2>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100 min-h-screen">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-xl overflow-hidden">

                <div class="bg-blue-700 text-white px-6 py-4">
                    <h3 class="text-2xl font-bold">
                        {{ $student->first_name }} {{ $student->last_name }}
                    </h3>
                </div>

                <div class="p-8">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                        <!-- Student Photo -->
                        <div class="text-center">

                            @if($student->photo)
                                <img src="{{ asset('storage/'.$student->photo) }}"
                                     class="w-56 h-56 rounded-lg border shadow object-cover mx-auto">
                            @else
                                <img src="https://via.placeholder.com/220x220?text=No+Photo"
                                     class="w-56 h-56 rounded-lg border shadow mx-auto">
                            @endif

                        </div>

                        <!-- Student Information -->
                        <div class="md:col-span-2">

                            <table class="w-full">

                                <tr class="border-b">
                                    <td class="py-3 font-bold w-48">Student ID</td>
                                    <td>{{ $student->student_id }}</td>
                                </tr>

                                <tr class="border-b">
                                    <td class="py-3 font-bold">First Name</td>
                                    <td>{{ $student->first_name }}</td>
                                </tr>

                                <tr class="border-b">
                                    <td class="py-3 font-bold">Last Name</td>
                                    <td>{{ $student->last_name }}</td>
                                </tr>

                                <tr class="border-b">
                                    <td class="py-3 font-bold">Date of Birth</td>
                                    <td>{{ $student->date_of_birth }}</td>
                                </tr>

                                <tr class="border-b">
                                    <td class="py-3 font-bold">Gender</td>
                                    <td>{{ $student->gender }}</td>
                                </tr>

                                <tr class="border-b">
                                    <td class="py-3 font-bold">Phone</td>
                                    <td>{{ $student->phone }}</td>
                                </tr>

                                <tr class="border-b">
                                    <td class="py-3 font-bold">Email</td>
                                    <td>{{ $student->email }}</td>
                                </tr>

                                <tr class="border-b">
                                    <td class="py-3 font-bold">Address</td>
                                    <td>{{ $student->address }}</td>
                                </tr>

                                <tr class="border-b">
                                    <td class="py-3 font-bold">Status</td>
                                    <td>
                                        @if($student->status == 'Active')
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                                Active
                                            </span>
                                        @else
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="py-3 font-bold">Registered On</td>
                                    <td>{{ $student->created_at->format('d M Y') }}</td>
                                </tr>

                            </table>

                        </div>

                    </div>

                    <div class="mt-8 flex gap-3">

                        <a href="{{ route('students.edit',$student) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded">
                            Edit Student
                        </a>

                        <a href="{{ route('students.index') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                            Back to Students
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>