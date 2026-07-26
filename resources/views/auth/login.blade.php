<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600 text-center text-2xl font-bold mb-4">
        {{ __('Log in') }}
    </h1>

    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm rounded-2xl shadow-xl p-6 transition-shadow duration-300 hover:shadow-2xl">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input
                    id="email"
                    class="block mt-1 w-full transition duration-200 focus:ring-2 focus:ring-violet-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input
                    id="password"
                    class="block mt-1 w-full transition duration-200 focus:ring-2 focus:ring-violet-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-2 focus:ring-violet-500 transition duration-200">

                    <span class="ms-2 text-sm text-gray-600">
                        {{ __('Remember me') }}
                    </span>
                </label>
            </div>

            <!-- Links -->
            <div class="flex items-center justify-between mt-6">

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="underline text-sm text-gray-600 hover:text-gray-900 transition duration-200">
                        {{ __('Register') }}
                    </a>
                @endif

                <div class="flex items-center">

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="underline text-sm text-gray-600 hover:text-gray-900 mr-4 transition duration-200">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 hover:shadow-lg transition duration-200">
                        {{ __('Log in') }}
                    </x-primary-button>

                </div>

            </div>

        </form>
    </div>
</x-guest-layout>