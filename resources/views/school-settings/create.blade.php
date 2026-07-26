<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            Create School Settings
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

        <form action="{{ route('school-settings.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="bg-white shadow rounded-xl p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- School Logo -->
                    <div>
                        <label class="block font-semibold mb-2">
                            School Logo
                        </label>

                        <input type="file"
                               name="logo"
                               class="border rounded w-full p-3">
                    </div>

                    <!-- Principal Signature -->
                    <div>
                        <label class="block font-semibold mb-2">
                            Principal Signature
                        </label>

                        <input type="file"
                               name="principal_signature"
                               class="border rounded w-full p-3">
                    </div>

                    <!-- School Stamp -->
                    <div>
                        <label class="block font-semibold mb-2">
                            School Stamp
                        </label>

                        <input type="file"
                               name="school_stamp"
                               class="border rounded w-full p-3">
                    </div>

                    <input type="text"
                           name="school_name"
                           placeholder="School Name"
                           value="{{ old('school_name') }}"
                           class="border rounded p-3">

                    <input type="text"
                           name="motto"
                           placeholder="School Motto"
                           value="{{ old('motto') }}"
                           class="border rounded p-3">

                    <input type="text"
                           name="address"
                           placeholder="Address"
                           value="{{ old('address') }}"
                           class="border rounded p-3">

                    <input type="text"
                           name="phone"
                           placeholder="Phone"
                           value="{{ old('phone') }}"
                           class="border rounded p-3">

                    <input type="email"
                           name="email"
                           placeholder="Email"
                           value="{{ old('email') }}"
                           class="border rounded p-3">

                    <input type="text"
                           name="website"
                           placeholder="Website"
                           value="{{ old('website') }}"
                           class="border rounded p-3">

                    <input type="text"
                           name="principal"
                           placeholder="Principal"
                           value="{{ old('principal') }}"
                           class="border rounded p-3">

                    <input type="text"
                           name="current_session"
                           placeholder="2026/2027"
                           value="{{ old('current_session') }}"
                           class="border rounded p-3">

                    <select name="current_term" class="border rounded p-3">

    <option value="First Term" {{ old('current_term') == 'First Term' ? 'selected' : '' }}>
        First Term
    </option>

    <option value="Second Term" {{ old('current_term') == 'Second Term' ? 'selected' : '' }}>
        Second Term
    </option>

    <option value="Third Term" {{ old('current_term') == 'Third Term' ? 'selected' : '' }}>
        Third Term
    </option>

</select>

                </div>

                <div class="mt-8">

                    <button type="submit"
                            class="bg-violet-600 hover:bg-violet-700 text-white px-6 py-3 rounded">
                        Save Settings
                    </button>

                </div>

            </div>

        </form>

    </div>

</x-app-layout>