<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white">
            Edit Fee Payment
        </h2>
    </x-slot>

    <div class="py-8 bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white rounded-lg shadow-lg p-6">

                <form action="{{ route('fees.update',$fee) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-6">

                        <div>
                            <label>Student</label>

                            <select name="student_id" class="w-full border rounded p-2">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}"
                                    {{ $fee->student_id==$student->id?'selected':'' }}>
                                        {{ $student->student_id }}
                                        -
                                        {{ $student->first_name }}
                                        {{ $student->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Class</label>

                            <select name="school_class_id" class="w-full border rounded p-2">
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}"
                                    {{ $fee->school_class_id==$class->id?'selected':'' }}>
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Term</label>

                            <select name="term" class="w-full border rounded p-2">

                                <option {{ $fee->term=='First'?'selected':'' }}>First</option>
                                <option {{ $fee->term=='Second'?'selected':'' }}>Second</option>
                                <option {{ $fee->term=='Third'?'selected':'' }}>Third</option>

                            </select>
                        </div>

                        <div>
                            <label>Session</label>

                            <input type="text"
                                   name="session"
                                   value="{{ $fee->session }}"
                                   class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label>Amount Due</label>

                            <input type="number"
                                   step="0.01"
                                   name="amount_due"
                                   value="{{ $fee->amount_due }}"
                                   class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label>Amount Paid</label>

                            <input type="number"
                                   step="0.01"
                                   name="amount_paid"
                                   value="{{ $fee->amount_paid }}"
                                   class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label>Payment Date</label>

                            <input type="date"
                                   name="payment_date"
                                   value="{{ $fee->payment_date }}"
                                   class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label>Payment Method</label>

                            <input type="text"
                                   name="payment_method"
                                   value="{{ $fee->payment_method }}"
                                   class="w-full border rounded p-2">
                        </div>

                        <div class="col-span-2">
                            <label>Receipt Number</label>

                            <input type="text"
                                   name="receipt_number"
                                   value="{{ $fee->receipt_number }}"
                                   class="w-full border rounded p-2">
                        </div>

                    </div>

                    <div class="mt-6">
                        <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded">
                            Update Payment
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>