<header class="bg-white shadow sticky top-0 z-40">

    <div class="flex justify-between items-center px-4 py-4">

        <button id="menuButton" class="lg:hidden text-3xl">
            ☰
        </button>

        <div>
            <h2 class="font-bold text-lg">
                School Management
            </h2>

            @isset($header)
                <div class="mt-2">
                    {{ $header }}
                </div>
            @endisset
        </div>

        <div class="flex items-center gap-4">

            <span class="hidden md:block">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-red-600">
                    Logout
                </button>
            </form>

        </div>

    </div>

</header>