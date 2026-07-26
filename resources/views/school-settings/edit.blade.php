<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            Edit School Settings
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">

        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('school-settings.update', $setting) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="bg-white shadow rounded-xl p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- School Logo -->
                    <div>
                        <label class="block mb-2 font-medium">
                            School Logo
                        </label>

                        @if($setting->logo)
                            <img src="{{ asset('storage/'.$setting->logo) }}"
                                 class="w-24 h-24 object-contain border rounded mb-3">
                        @endif

                        <input type="file"
                               name="logo"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <!-- Principal Signature -->
                    <div>
                        <label class="block mb-2 font-medium">
                            Principal Signature
                        </label>

                        @if($setting->principal_signature)
                            <img src="{{ asset('storage/'.$setting->principal_signature) }}"
                                 class="w-32 h-20 object-contain border rounded mb-3">
                        @endif

                        <input type="file"
                               name="principal_signature"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <!-- School Stamp -->
                    <div>
                        <label class="block mb-2 font-medium">
                            School Stamp
                        </label>

                        @if($setting->school_stamp)
                            <img src="{{ asset('storage/'.$setting->school_stamp) }}"
                                 class="w-24 h-24 object-contain border rounded mb-3">
                        @endif

                        <input type="file"
                               name="school_stamp"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">School Name</label>
                        <input
                            type="text"
                            name="school_name"
                            value="{{ old('school_name', $setting->school_name) }}"
                            class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">School Motto</label>
                        <input
                            type="text"
                            name="motto"
                            value="{{ old('motto', $setting->motto) }}"
                            class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">Address</label>
                        <input
                            type="text"
                            name="address"
                            value="{{ old('address', $setting->address) }}"
                            class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">Phone Number</label>
                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $setting->phone) }}"
                            class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $setting->email) }}"
                            class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">Website</label>
                        <input
                            type="text"
                            name="website"
                            value="{{ old('website', $setting->website) }}"
                            class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">Principal</label>
                        <input
                            type="text"
                            name="principal"
                            value="{{ old('principal', $setting->principal) }}"
                            class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">Current Session</label>
                        <input
                            type="text"
                            name="current_session"
                            value="{{ old('current_session', $setting->current_session) }}"
                            class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">Current Term</label>

                        <select name="current_term" class="border rounded p-3">

    <option value="First Term"
        {{ old('current_term', $setting->current_term) == 'First Term' ? 'selected' : '' }}>
        First Term
    </option>

    <option value="Second Term"
        {{ old('current_term', $setting->current_term) == 'Second Term' ? 'selected' : '' }}>
        Second Term
    </option>

    <option value="Third Term"
        {{ old('current_term', $setting->current_term) == 'Third Term' ? 'selected' : '' }}>
        Third Term
    </option>

</select>
                    </div>

                </div>

                <div class="mt-8 flex gap-4">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
                        Update Settings
                    </button>

                    <a href="{{ route('school-settings.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">
                        Cancel
                    </a>

                </div>

            </div>

        </form>

    </div>

</x-app-layout>