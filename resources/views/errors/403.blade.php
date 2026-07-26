<x-app-layout>

<div class="max-w-3xl mx-auto py-20 text-center">

    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl p-12 transition hover:shadow-2xl">

        <h1 class="text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600">
            403
        </h1>

        <p class="mt-5 text-gray-700 text-lg">
            You are not authorized to access this page.
        </p>

        <a href="{{ route('dashboard') }}"
        class="mt-6 inline-block bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white px-6 py-3 rounded-lg shadow transition transform hover:scale-105">
        Back Dashboard
    </a>

    </div>

</div>

</x-app-layout>