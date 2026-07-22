<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white">
            Fee Payment Details
        </h2>
    </x-slot>

    <div class="py-8 bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen">

        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow-lg rounded-lg p-8">

                <table class="table-auto w-full">

                    <tr>
                        <th class="text-left py-2">Student</th>
                        <td>{{ $fee->student->first_name }} {{ $fee->student->last_name }}</td>
                    </tr>

                    <tr>
                        <th class="text-left py-2">Student ID</th>
                        <td>{{ $fee->student->student_id }}</td>
                    </tr>

                    <tr>
                        <th>Class</th>
                        <td>{{ $fee->schoolClass->class_name }}</td>
                    </tr>

                    <tr>
                        <th>Term</th>
                        <td>{{ $fee->term }}</td>
                    </tr>

                    <tr>
                        <th>Session</th>
                        <td>{{ $fee->session }}</td>
                    </tr>

                    <tr>
                        <th>Amount Due</th>
                        <td>₦{{ number_format($fee->amount_due,2) }}</td>
                    </tr>

                    <tr>
                        <th>Amount Paid</th>
                        <td>₦{{ number_format($fee->amount_paid,2) }}</td>
                    </tr>

                    <tr>
                        <th>Balance</th>
                        <td>₦{{ number_format($fee->balance,2) }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{ $fee->status }}</td>
                    </tr>

                    <tr>
                        <th>Payment Date</th>
                        <td>{{ $fee->payment_date }}</td>
                    </tr>

                    <tr>
                        <th>Payment Method</th>
                        <td>{{ $fee->payment_method }}</td>
                    </tr>

                    <tr>
                        <th>Receipt Number</th>
                        <td>{{ $fee->receipt_number }}</td>
                    </tr>

                </table>

                <div class="mt-8 flex gap-4">

                    <a href="{{ route('fees.edit',$fee) }}"
                       class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded">
                        Edit
                    </a>

                    <a href="{{ route('fees.index') }}"
                       class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded">
                        Back
                    </a>

                    <button onclick="window.print()"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                        Print Receipt
                    </button>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>