@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">My Payslips</h3>

<div class="card p-4 shadow-sm">

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Bonus</th>
                    <th>Deductions</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @forelse($payrolls as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->department }}</td>
                    <td>₹{{ $p->salary }}</td>
                    <td>₹{{ $p->bonus }}</td>
                    <td>₹{{ $p->deductions }}</td>
                    <td><strong>₹{{ $p->total }}</strong></td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No payslip available</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection