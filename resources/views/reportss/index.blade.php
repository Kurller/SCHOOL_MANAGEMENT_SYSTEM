<x-app-layout>

<x-slot name="header">
    <h2 class="text-2xl font-bold text-gray-800">
        Reports Dashboard
    </h2>
</x-slot>

<div class="py-6">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Students -->
            <div class="bg-blue-600 text-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold">Students</h3>
                <p class="text-4xl font-bold mt-3">{{ $students }}</p>
            </div>

            <!-- Teachers -->
            <div class="bg-green-600 text-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold">Teachers</h3>
                <p class="text-4xl font-bold mt-3">{{ $teachers }}</p>
            </div>

            <!-- Classes -->
            <div class="bg-yellow-500 text-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold">Classes</h3>
                <p class="text-4xl font-bold mt-3">{{ $classes }}</p>
            </div>

            <!-- Subjects -->
            <div class="bg-purple-600 text-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold">Subjects</h3>
                <p class="text-4xl font-bold mt-3">{{ $subjects }}</p>
            </div>

        </div>

        <!-- Fees -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

            <div class="bg-white shadow rounded-lg p-6 border-l-4 border-green-500">
                <h3 class="text-lg font-semibold text-gray-700">
                    Fees Collected
                </h3>

                <p class="text-3xl font-bold text-green-600 mt-3">
                    ₦{{ number_format($feesCollected,2) }}
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6 border-l-4 border-red-500">
                <h3 class="text-lg font-semibold text-gray-700">
                    Outstanding Fees
                </h3>

                <p class="text-3xl font-bold text-red-600 mt-3">
                    ₦{{ number_format($outstandingFees,2) }}
                </p>
            </div>

        </div>

        <!-- Attendance -->
        <div class="bg-white shadow rounded-lg mt-8 p-6">

            <h3 class="text-xl font-bold mb-6">
                Attendance Summary
            </h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-bold mb-4">
            Student Registration
        </h2>

        <canvas id="studentChart"></canvas>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-bold mb-4">
            Monthly Fee Collection
        </h2>

        <canvas id="feeChart"></canvas>
    </div>

</div>

            <div class="grid grid-cols-2 gap-6">

                <div class="bg-green-100 rounded-lg p-5 text-center">
                    <h4 class="font-semibold text-gray-700">
                        Present
                    </h4>

                    <p class="text-4xl font-bold text-green-700 mt-3">
                        {{ $present }}
                    </p>
                </div>

                <div class="bg-red-100 rounded-lg p-5 text-center">
                    <h4 class="font-semibold text-gray-700">
                        Absent
                    </h4>

                    <p class="text-4xl font-bold text-red-700 mt-3">
                        {{ $absent }}
                    </p>
                </div>

            </div>

        </div>

        <!-- Coming Soon -->
        <div class="bg-white shadow rounded-lg mt-8 p-6">

            <h3 class="text-xl font-bold mb-4">
                Analytics (Coming Next)
            </h3>

            <ul class="list-disc ml-6 text-gray-700 space-y-2">
                <li>Student Registration Chart</li>
                <li>Monthly Fee Collection Chart</li>
                <li>Attendance Percentage Chart</li>
                <li>Top Performing Students</li>
                <li>Best Performing Classes</li>
                <li>Subject Performance Analysis</li>
                <li>Export Reports to PDF</li>
                <li>Export Reports to Excel</li>
            </ul>

        </div>

    </div>

</div>
<script>

const studentLabels = [
@foreach($studentMonths as $month)
'{{ DateTime::createFromFormat('!m',$month->month)->format('M') }}',
@endforeach
];

const studentData = [
@foreach($studentMonths as $month)
{{ $month->total }},
@endforeach
];

new Chart(document.getElementById('studentChart'),{

type:'bar',

data:{
labels:studentLabels,

datasets:[{
label:'Students Registered',
data:studentData
}]
}

});

const feeLabels = [
@foreach($feeMonths as $month)
'{{ DateTime::createFromFormat('!m',$month->month)->format('M') }}',
@endforeach
];

const feeData = [
@foreach($feeMonths as $month)
{{ $month->total }},
@endforeach
];

new Chart(document.getElementById('feeChart'),{

type:'line',

data:{
labels:feeLabels,

datasets:[{
label:'Fees Collected',
data:feeData
}]
}

});

</script>
</x-app-layout>