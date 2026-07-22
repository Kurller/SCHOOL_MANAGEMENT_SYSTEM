<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-violet-700">
            School Fees
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8">

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-violet-700 text-white">

                    <tr>

                        <th class="px-6 py-3">Student</th>
                        <th class="px-6 py-3">Amount</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Payment Date</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($fees ?? [] as $fee)

                        <tr class="border-b">

                            <td class="px-6 py-3">
                                {{ $fee->student->first_name }}
                                {{ $fee->student->last_name }}
                            </td>

                            <td class="px-6 py-3">
                                ₦{{ number_format($fee->amount,2) }}
                            </td>

                            <td class="px-6 py-3">

                                @if($fee->status=='Paid')

                                    <span class="text-green-600 font-bold">
                                        Paid
                                    </span>

                                @else

                                    <span class="text-red-600 font-bold">
                                        Unpaid
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-3">
                                {{ $fee->payment_date }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-8">
                                No fee records available.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>