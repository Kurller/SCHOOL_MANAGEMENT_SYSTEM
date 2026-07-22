@php
    $role = auth()->user()?->role?->name;
@endphp

<aside
    id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 overflow-y-auto bg-violet-700 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300">

    <div class="p-6 border-b border-violet-500">
        <h1 class="text-2xl font-bold">
            School MS
        </h1>

        <p class="text-sm text-violet-200 mt-1">
            {{ $role }}
        </p>
    </div>

    <nav class="mt-4">

        {{-- Dashboard --}}
        @if($role === 'Student')

            <a href="{{ route('student.dashboard') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Dashboard
            </a>

        @elseif($role === 'Parent')

            <a href="{{ route('parent.dashboard') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Dashboard
            </a>

        @else

            <a href="{{ route('dashboard') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Dashboard
            </a>

        @endif


        {{-- ===================== --}}
        {{-- ADMIN ONLY --}}
        {{-- ===================== --}}
        @if($role === 'Admin')

            <a href="{{ route('users.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Users
            </a>

            <a href="{{ route('school-settings.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                School Settings
            </a>

        @endif


        {{-- ===================== --}}
        {{-- ADMIN + PRINCIPAL --}}
        {{-- ===================== --}}
        @if(in_array($role, ['Admin', 'Principal']))

            <a href="{{ route('students.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Students
            </a>

            <a href="{{ route('teachers.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Teachers
            </a>

            <a href="{{ route('classes.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Classes
            </a>

            <a href="{{ route('subjects.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Subjects
            </a>

            <a href="{{ route('class-subjects.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Subject Assignments
            </a>

            <a href="{{ route('enrollments.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Enrollments
            </a>

        @endif


        {{-- ===================== --}}
        {{-- ADMIN + PRINCIPAL + TEACHER --}}
        {{-- ===================== --}}
        @if(in_array($role, ['Admin', 'Principal', 'Teacher']))

            <a href="{{ route('attendances.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Attendance
            </a>

            <a href="{{ route('results.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Results
            </a>

            <a href="{{ route('report-cards.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Report Cards
            </a>

        @endif


        {{-- ===================== --}}
        {{-- ADMIN + ACCOUNTANT --}}
        {{-- ===================== --}}
        @if(in_array($role, ['Admin', 'Accountant']))

            <a href="{{ route('fees.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Fees
            </a>

            <a href="{{ route('reports.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Reports
            </a>

        @endif


        {{-- ===================== --}}
        {{-- STUDENT --}}
        {{-- ===================== --}}
        @if($role === 'Student')

            <a href="{{ route('student.results.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                My Results
            </a>

           {{-- Uncomment after creating the routes --}}

{{-- 
<a href="{{ route('student.report-cards.index') }}">
    My Report Cards
</a>

<a href="{{ route('student.attendance.index') }}">
    My Attendance
</a>

<a href="{{ route('student.fees.index') }}">
    My Fees
</a>
--}}

        @endif


        {{-- ===================== --}}
        {{-- PARENT --}}
        {{-- ===================== --}}
        @if($role === 'Parent')

            <a href="{{ route('parent.children') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                My Children
            </a>

            <a href="{{ route('parent.results.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Children's Results
            </a>

            <a href="{{ route('parent.fees.index') }}"
               class="block px-6 py-3 hover:bg-violet-600">
                Fees
            </a>

        @endif

    </nav>

</aside>