<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            Create User
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">

        <div class="bg-white shadow rounded-xl p-8">

            <form action="{{ route('users.store') }}"
                  method="POST">

                @csrf

                @include('users._form')

            </form>

        </div>

    </div>

</x-app-layout>