<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600 leading-tight">
            Add Teacher
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-6">

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg transition-all duration-300">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('teachers.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="grid grid-cols-2 gap-4">

                        <!-- Teacher ID -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Teacher ID</label>
                            <input type="text"
                                   name="teacher_id"
                                   value="{{ old('teacher_id') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Staff Number -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Staff Number</label>
                            <input type="text"
                                   name="staff_number"
                                   value="{{ old('staff_number') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- First Name -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text"
                                   name="first_name"
                                   value="{{ old('first_name') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text"
                                   name="last_name"
                                   value="{{ old('last_name') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Date of Birth</label>
                            <input
                                type="date"
                                name="date_of_birth"
                                value="{{ old('date_of_birth') }}"
                                class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Gender</label>
                            <select name="gender" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Phone</label>
                            <input type="text"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Email</label>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Qualification -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Qualification</label>
                            <input type="text"
                                   name="qualification"
                                   value="{{ old('qualification') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Specialization -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Specialization</label>
                            <input type="text"
                                   name="specialization"
                                   value="{{ old('specialization') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Employment Date -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Employment Date</label>
                            <input type="date"
                                   name="employment_date"
                                   required
                                   value="{{ old('employment_date') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Salary -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Salary</label>
                            <input
                                type="number"
                                step="0.01"
                                name="salary"
                                required
                                value="{{ old('salary') }}"
                                class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Photo -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Photo</label>
                            <input type="file"
                                   name="photo"
                                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">
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
                                class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-violet-500 transition-all duration-200">{{ old('address') }}</textarea>
                        </div>

                    </div>

                    <div class="mt-6">
                        <button class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            Save Teacher
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
