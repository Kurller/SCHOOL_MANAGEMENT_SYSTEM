<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
                School Settings
            </h2>

            @if($setting)
                <a href="{{ route('school-settings.edit', $setting->id) }}"
                   class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-5 py-2 rounded-lg shadow transition transform hover:scale-105">
                    ✏️ Edit Settings
                </a>
            @else
                <a href="{{ route('school-settings.create') }}"
                   class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-5 py-2 rounded-lg shadow transition transform hover:scale-105">
                    ➕ Add Settings
                </a>
            @endif
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto py-8">

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if($setting)

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden transition hover:shadow-2xl">

                <div class="p-8">

                    <!-- Images -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">

                        <div class="text-center">
                            <h3 class="font-semibold text-gray-700 mb-3">
                                School Logo
                            </h3>

                            @if($setting->logo)
                                <img src="{{ asset('storage/'.$setting->logo) }}"
                                     class="w-36 h-36 object-contain border rounded-lg mx-auto transition hover:scale-105">
                            @else
                                <p class="text-gray-400">No Logo Uploaded</p>
                            @endif
                        </div>

                        <div class="text-center">
                            <h3 class="font-semibold text-gray-700 mb-3">
                                Principal Signature
                            </h3>

                            @if($setting->principal_signature)
                                <img src="{{ asset('storage/'.$setting->principal_signature) }}"
                                     class="w-36 h-24 object-contain border rounded-lg mx-auto transition hover:scale-105">
                            @else
                                <p class="text-gray-400">No Signature Uploaded</p>
                            @endif
                        </div>

                        <div class="text-center">
                            <h3 class="font-semibold text-gray-700 mb-3">
                                School Stamp
                            </h3>

                            @if($setting->school_stamp)
                                <img src="{{ asset('storage/'.$setting->school_stamp) }}"
                                     class="w-36 h-36 object-contain border rounded-lg mx-auto transition hover:scale-105">
                            @else
                                <p class="text-gray-400">No Stamp Uploaded</p>
                            @endif
                        </div>

                    </div>

                    <!-- School Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="font-semibold text-gray-600">School Name</label>
                            <p>{{ $setting->school_name }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">Motto</label>
                            <p>{{ $setting->motto ?: '-' }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">Address</label>
                            <p>{{ $setting->address ?: '-' }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">Phone</label>
                            <p>{{ $setting->phone ?: '-' }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">Email</label>
                            <p>{{ $setting->email ?: '-' }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">Website</label>
                            <p>{{ $setting->website ?: '-' }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">Principal</label>
                            <p>{{ $setting->principal ?: '-' }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">Current Session</label>
                            <p>{{ $setting->current_session }}</p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">Current Term</label>
                            <p>{{ $setting->current_term }}</p>
                        </div>

                    </div>

                    <div class="mt-10">
                        <a href="{{ route('school-settings.edit', $setting->id) }}"
                           class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-3 rounded-lg shadow transition transform hover:scale-105">
                            Edit Settings
                        </a>
                    </div>

                </div>

            </div>

        @else

            <div class="bg-gradient-to-r from-yellow-100 to-orange-100 border border-yellow-300 rounded-2xl p-8 text-center shadow-xl transition hover:shadow-2xl">

                <h3 class="text-xl font-semibold mb-4">
                    No School Settings Found
                </h3>

                <p class="mb-6">
                    Create your school's information before using report cards and receipts.
                </p>

                <a href="{{ route('school-settings.create') }}"
                   class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-6 py-3 rounded-lg shadow transition transform hover:scale-105">
                    ➕ Create School Settings
                </a>

            </div>

        @endif

    </div>

</x-app-layout>