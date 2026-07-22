<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white">
            Record Fee Payment
        </h2>
    </x-slot>

    <div class="py-8 bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen">
        <div class="max-w-4xl mx-auto">

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-lg p-6">

                <form action="{{ route('fees.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-2 gap-6">

                        <div>
                            <label>Student</label>
                            <select name="student_id" class="w-full border rounded p-2">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">
                                        {{ $student->student_id }} -
                                        {{ $student->first_name }} {{ $student->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Class</label>
                            <select name="school_class_id" class="w-full border rounded p-2">
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Term</label>
                            <select name="term" class="w-full border rounded p-2">
                                <option>First</option>
                                <option>Second</option>
                                <option>Third</option>
                            </select>
                        </div>

                        <div>
                            <label>Session</label>
                            <input type="text" name="session"
                                   value="{{ old('session') }}"
                                   class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label>Amount Due</label>
                            <input type="number" step="0.01"
                                   name="amount_due"
                                   value="{{ old('amount_due') }}"
                                   class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label>Amount Paid</label>
                            <input type="number" step="0.01"
                                   name="amount_paid"
                                   value="{{ old('amount_paid',0) }}"
                                   class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label>Payment Date</label>
                            <input type="date"
                                   name="payment_date"
                                   class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label>Payment Method</label>
                            <select name="payment_method" class="w-full border rounded p-2">
                                <option value="">Select</option>
                                <option>Cash</option>
                                <option>Transfer</option>
                                <option>POS</option>
                                <option>Cheque</option>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label>Receipt Number</label>
                            <input type="text"
                                   name="receipt_number"
                                   value="{{ old('receipt_number') }}"
                                   class="w-full border rounded p-2">
                        </div>

                    </div>

                    <div class="mt-6">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                            Save Payment
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>