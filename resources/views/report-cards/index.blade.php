<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl sm:text-2xl font-bold text-violet-700">
        Generate Student Report Card
    </h2>
</x-slot>

<div class="py-4 sm:py-6 lg:py-8">

    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-xl p-4 sm:p-6 lg:p-8">

        <form method="POST" action="{{ route('report-cards.generate') }}">

            @csrf

            {{-- Student --}}
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Select Student
                </label>

                <select
                    name="student_id"
                    required
                    class="w-full rounded-lg border border-gray-300 p-3 text-sm focus:border-violet-500 focus:ring focus:ring-violet-200">

                    <option value="">
                        -- Select Student --
                    </option>

                    @foreach($students as $student)

                        <option value="{{ $student->id }}">
                            {{ $student->first_name }}
                            {{ $student->last_name }}
                            ({{ $student->student_id }})
                        </option>

                    @endforeach

                </select>

                @error('student_id')
                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Current School Session --}}
            @if($school)

            <div class="mb-6 rounded-lg bg-violet-50 border border-violet-200 p-4">

                <h3 class="font-semibold text-violet-700 mb-3">
                    Current Academic Session
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    <div>

                        <p class="text-sm text-gray-500">
                            Current Term
                        </p>

                        <p class="font-semibold">
                            {{ $school->current_term }}
                        </p>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">
                            Current Session
                        </p>

                        <p class="font-semibold">
                            {{ $school->current_session }}
                        </p>

                    </div>

                </div>

            </div>

            @endif


            {{-- Button --}}
            <button
                type="submit"
                class="w-full bg-violet-700 hover:bg-violet-800 text-white font-semibold py-3 rounded-lg transition">

                Generate Report Card

            </button>

        </form>

    </div>

</div>

</x-app-layout>