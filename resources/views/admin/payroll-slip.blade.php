<!DOCTYPE html>
<html>
<head>
    <title>Salary Slip</title>
    <style>
        body { font-family: Arial; }
        .box { border:1px solid #000; padding:20px; }
        h2 { text-align:center; }
        table { width:100%; margin-top:20px; border-collapse: collapse; }
        table, th, td { border:1px solid #000; padding:10px; }
    </style>
</head>
<body>

<div class="box">
    <h2>Salary Slip</h2>

    <p><strong>Employee:</strong> {{ $payroll->employee->name }}</p>
    <p><strong>Department:</strong> {{ $payroll->department }}</p>

    <table>
        <tr>
            <th>Salary</th>
            <td>{{ $payroll->salary }}</td>
        </tr>
        <tr>
            <th>Bonus</th>
            <td>{{ $payroll->bonus }}</td>
        </tr>
        <tr>
            <th>Deductions</th>
            <td>{{ $payroll->deductions }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td><strong>{{ $payroll->total }}</strong></td>
        </tr>
    </table>

</div>

</body>
</html>