<!DOCTYPE html>
<html>

<head>
    <style>

        body{
            font-family: DejaVu Sans;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid black;
            padding:8px;
        }

        th{
            background:#dddddd;
        }

    </style>
</head>

<body>

<h2>Students Report</h2>

<table>

<tr>
    <th>ID</th>
    <th>Admission No</th>
    <th>Name</th>
    <th>Gender</th>
</tr>

@foreach($students as $student)

<tr>

<td>{{ $student->id }}</td>

<td>{{ $student->student_id }}</td>

<td>
{{ $student->first_name }}
{{ $student->last_name }}
</td>

<td>{{ $student->gender }}</td>

</tr>

@endforeach

</table>

</body>

</html>