<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-white">
                Fees Management
            </h2>

            <a href="{{ route('fees.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">
                + Record Payment
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen">

        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-lg overflow-hidden">

                <table class="min-w-full">

                    <thead class="bg-blue-700 text-white">

                    <tr>
                        <th class="px-4 py-3 text-left">Student</th>
                        <th class="px-4 py-3">Class</th>
                        <th class="px-4 py-3">Term</th>
                        <th class="px-4 py-3">Session</th>
                        <th class="px-4 py-3">Amount Due</th>
                        <th class="px-4 py-3">Paid</th>
                        <th class="px-4 py-3">Balance</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($fees as $fee)

                        <tr class="border-b hover:bg-gray-100">

                            <td class="px-4 py-3">
                                {{ $fee->student->first_name }}
                                {{ $fee->student->last_name }}
                            </td>

                            <td class="text-center">
                                {{ $fee->schoolClass->class_name }}
                            </td>

                            <td class="text-center">
                                {{ $fee->term }}
                            </td>

                            <td class="text-center">
                                {{ $fee->session }}
                            </td>

                            <td class="text-center">
                                ₦{{ number_format($fee->amount_due,2) }}
                            </td>

                            <td class="text-center text-green-700 font-bold">
                                ₦{{ number_format($fee->amount_paid,2) }}
                            </td>

                            <td class="text-center text-red-600">
                                ₦{{ number_format($fee->balance,2) }}
                            </td>

                            <td class="text-center">

                                @if($fee->status=="Paid")

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                        Paid
                                    </span>

                                @elseif($fee->status=="Part Payment")

                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                        Part Payment
                                    </span>

                                @else

                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                        Unpaid
                                    </span>

                                @endif

                            </td>

                            <td class="text-center space-x-2">

                                <a href="{{ route('fees.show',$fee) }}"
                                   class="bg-blue-600 text-white px-3 py-1 rounded">
                                    View
                                </a>

                                <a href="{{ route('fees.edit',$fee) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('fees.destroy',$fee) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete payment?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                class="text-center py-8 text-gray-500">

                                No fee records found.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-6">
                {{ $fees->links() }}
            </div>

        </div>

    </div>

</x-app-layout>