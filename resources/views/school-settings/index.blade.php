<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-violet-700">
                School Settings
            </h2>

            @if($setting)
                <a href="{{ route('school-settings.edit', $setting->id) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
                    ✏️ Edit Settings
                </a>
            @else
                <a href="{{ route('school-settings.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow">
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

            <div class="bg-white shadow-xl rounded-xl overflow-hidden">

                <div class="p-8">

                    <!-- Images -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">

                        <div class="text-center">
                            <h3 class="font-semibold text-gray-700 mb-3">
                                School Logo
                            </h3>

                            @if($setting->logo)
                                <img src="{{ asset('storage/'.$setting->logo) }}"
                                     class="w-36 h-36 object-contain border rounded-lg mx-auto">
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
                                     class="w-36 h-24 object-contain border rounded-lg mx-auto">
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
                                     class="w-36 h-36 object-contain border rounded-lg mx-auto">
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
                           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow">
                            Edit Settings
                        </a>
                    </div>

                </div>

            </div>

        @else

            <div class="bg-yellow-100 border border-yellow-300 rounded-xl p-8 text-center">

                <h3 class="text-xl font-semibold mb-4">
                    No School Settings Found
                </h3>

                <p class="mb-6">
                    Create your school's information before using report cards and receipts.
                </p>

                <a href="{{ route('school-settings.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
                    ➕ Create School Settings
                </a>

            </div>

        @endif

    </div>

</x-app-layout>