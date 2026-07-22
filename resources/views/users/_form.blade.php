<div class="grid md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-semibold">
            Full Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name ?? '') }}"
            class="w-full border rounded-lg p-3">

        @error('name')
            <p class="text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email ?? '') }}"
            class="w-full border rounded-lg p-3">

        @error('email')
            <p class="text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Role
        </label>

        <select
            name="role_id"
            class="w-full border rounded-lg p-3">

            <option value="">Select Role</option>

            @foreach($roles as $role)

                <option
                    value="{{ $role->id }}"
                    @selected(old('role_id', $user->role_id ?? '') == $role->id)>
                    {{ $role->name }}
                </option>

            @endforeach

        </select>

        @error('role_id')
            <p class="text-red-500 mt-1">{{ $message }}</p>
        @enderror

    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Password
        </label>

        <input
            type="password"
            name="password"
            class="w-full border rounded-lg p-3">

        @error('password')
            <p class="text-red-500 mt-1">{{ $message }}</p>
        @enderror

    </div>

    <div>
        <label class="block mb-2 font-semibold">
            Confirm Password
        </label>

        <input
            type="password"
            name="password_confirmation"
            class="w-full border rounded-lg p-3">
    </div>

</div>

<div class="mt-8 flex justify-end gap-4">

    <a href="{{ route('users.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">
        Cancel
    </a>

    <button
        type="submit"
        class="bg-violet-600 hover:bg-violet-700 text-white px-6 py-3 rounded-lg">

        Save User

    </button>

</div>