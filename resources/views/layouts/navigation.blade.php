<nav class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 shadow-lg">

    <div class="max-w-7xl mx-auto px-4">

        <div class="flex justify-between items-center h-16">


            <!-- Logo -->
            <a href="{{ route('dashboard') }}"
               class="text-xl font-bold text-yellow-300">
                School Management
            </a>



            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-6 text-white">

                <a href="{{ route('dashboard') }}" class="hover:text-yellow-300">
                    Dashboard
                </a>


                @if(auth()->user()?->role?->name !== 'Student' &&
                    auth()->user()?->role?->name !== 'Parent')

                    <a href="{{ route('students.index') }}" class="hover:text-yellow-300">
                        Students
                    </a>

                    <a href="{{ route('teachers.index') }}" class="hover:text-yellow-300">
                        Teachers
                    </a>

                    <a href="{{ route('classes.index') }}" class="hover:text-yellow-300">
                        Classes
                    </a>

                    <a href="{{ route('subjects.index') }}" class="hover:text-yellow-300">
                        Subjects
                    </a>

                    <a href="{{ route('class-subjects.index') }}" class="hover:text-yellow-300">
                        Assignments
                    </a>

                    <a href="{{ route('enrollments.index') }}" class="hover:text-yellow-300">
                        Enrollments
                    </a>

                    <a href="{{ route('attendances.index') }}" class="hover:text-yellow-300">
                        Attendance
                    </a>

                    <a href="{{ route('results.index') }}" class="hover:text-yellow-300">
                        Results
                    </a>

                    <a href="{{ route('report-cards.index') }}" class="hover:text-yellow-300">
                        Report Cards
                    </a>


                    <a href="{{ route('fees.index') }}" class="hover:text-yellow-300">
                        Fees
                    </a>


                    <a href="{{ route('reports.index') }}" class="hover:text-yellow-300">
                        Reports
                    </a>


                    @if(auth()->user()?->role?->name === 'Admin')

                        <a href="{{ route('users.index') }}" 
                           class="hover:text-yellow-300">
                            Users
                        </a>

                    @endif


                @endif


            </div>
            <!-- END Desktop Menu -->



            <!-- User -->
            <div class="hidden lg:flex items-center text-white">

                <span class="mr-4">
                    {{ Auth::user()->name }}
                </span>


                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                            class="hover:text-red-200">
                        Logout
                    </button>

                </form>

            </div>



            <!-- Mobile Button -->
            <button id="menu-btn"
                    class="lg:hidden text-white text-3xl">

                ☰

            </button>


        </div>



        <!-- Mobile Menu -->

        <div id="mobile-menu"
             class="hidden lg:hidden pb-4">


            <a class="block py-2 text-white"
               href="{{ route('dashboard') }}">
                Dashboard
            </a>


            @if(auth()->user()?->role?->name !== 'Student' &&
                auth()->user()?->role?->name !== 'Parent')


                <a class="block py-2 text-white"
                   href="{{ route('students.index') }}">
                    Students
                </a>


                <a class="block py-2 text-white"
                   href="{{ route('teachers.index') }}">
                    Teachers
                </a>


                <a class="block py-2 text-white"
                   href="{{ route('results.index') }}">
                    Results
                </a>


                <a class="block py-2 text-white"
                   href="{{ route('report-cards.index') }}">
                    Report Cards
                </a>


            @endif



            <div class="border-t border-pink-300 mt-3 pt-3">


                <p class="text-yellow-300 mb-2">
                    {{ Auth::user()->name }}
                </p>



                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                            class="text-white">
                        Logout
                    </button>

                </form>


            </div>


        </div>


    </div>

</nav>



<script>

document.addEventListener('DOMContentLoaded', function () {

    const btn = document.getElementById('menu-btn');

    const menu = document.getElementById('mobile-menu');


    btn.addEventListener('click', function () {

        menu.classList.toggle('hidden');

    });

});

</script>