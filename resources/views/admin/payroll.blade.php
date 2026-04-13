@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Payroll Management</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card p-4 shadow-sm">

    <!-- Top Actions -->
    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control w-25" placeholder="Search Employee...">

      <a href="/admin/payroll/export" class="btn btn-success">
    Export Payroll
</a>
    </div>

    <!-- Payroll Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Bonus</th>
                    <th>Deductions</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($payrolls as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->employee->name ?? 'N/A' }}</td>
                    <td>{{ $p->department }}</td>
                    <td>₹{{ $p->salary }}</td>
                    <td>₹{{ $p->bonus }}</td>
                    <td>₹{{ $p->deductions }}</td>
                    <td><strong>₹{{ $p->total }}</strong></td>
                    <td>
                        <a href="/admin/payroll/slip/{{ $p->id }}" class="btn btn-primary btn-sm">
                       Generate Slip
                     </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No payroll data found</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection