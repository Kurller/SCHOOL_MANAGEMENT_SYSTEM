<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
            Add Student
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white p-6">
                    <h3 class="text-xl font-bold">Student Information</h3>
                    <p class="text-white/80 text-sm mt-1">Fill in the details below to add a new student</p>
                </div>

                <div class="p-6">
                    @if ($errors->any())
                        <div class="mb-4 bg-gradient-to-r from-red-100 to-rose-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="grid grid-cols-2 gap-4">

                            <!-- Student ID -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Student ID</label>
                                <input type="text"
                                       name="student_id"
                                       value="{{ old('student_id') }}"
                                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- First Name -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">First Name</label>
                                <input type="text"
                                       name="first_name"
                                       value="{{ old('first_name') }}"
                                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Last Name</label>
                                <input type="text"
                                       name="last_name"
                                       value="{{ old('last_name') }}"
                                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Date of Birth -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Date of Birth</label>
                                <input type="date"
                                       name="date_of_birth"
                                       value="{{ old('date_of_birth') }}"
                                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Gender -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Gender</label>

                                <select name="gender" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender')=='Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender')=='Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Phone</label>
                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Email</label>
                                <input type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Photo -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Student Photo</label>
                                <input type="file"
                                       name="photo"
                                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block font-medium text-gray-700 mb-1">Status</label>

                                <select name="status" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="col-span-2">
                                <label class="block font-medium text-gray-700 mb-1">Address</label>

                                <textarea
                                    name="address"
                                    rows="3"
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">{{ old('address') }}</textarea>
                            </div>

                        </div>

                        <div class="mt-6">
                            <button
                                class="bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white px-6 py-2 rounded-lg font-semibold shadow-lg transition-all">
                                Save Student
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>