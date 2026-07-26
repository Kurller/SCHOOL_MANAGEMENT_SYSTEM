<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">
        Generate Student Report Card
    </h2>
</x-slot>

<div class="py-6 min-h-screen bg-gradient-to-br from-violet-100 via-fuchsia-100 to-pink-100">

    <div class="max-w-xl mx-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-gray-100">

        <div class="bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-600 text-white p-6">
            <h3 class="text-xl font-bold">Report Card Generator</h3>
            <p class="text-white/80 text-sm mt-1">Select a student to generate their report card</p>
        </div>

        <div class="p-6">
            <form method="POST" action="{{ route('report-cards.generate') }}">

                @csrf

                {{-- Student --}}
                <div class="mb-6">

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Select Student
                    </label>

                    <select
                        name="student_id"
                        required
                        class="w-full rounded-lg border border-gray-300 p-3 text-sm focus:ring-2 focus:ring-violet-500 focus:border-transparent outline-none transition-all">

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

                <div class="mb-6 rounded-xl bg-gradient-to-br from-violet-50 to-fuchsia-50 border border-violet-200 p-4">

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
                    class="w-full bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white font-semibold py-3 rounded-lg transition-all shadow-lg hover:shadow-xl">

                    Generate Report Card

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>