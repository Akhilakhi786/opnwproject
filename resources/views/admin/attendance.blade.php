@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Attendance</h3>

<div class="card p-4 shadow-sm">

    <div class="table-responsive">
        <table class="table table-bordered">

            <thead class="table-light">
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                </tr>
            </thead>

            <tbody>
                @forelse($attendances as $att)
                <tr>
                    <td>{{ $att->employee->employee_id }}</td>
                    <td>{{ $att->employee->name }}</td>
                    <td>{{ $att->employee->department }}</td>

                    <td>
                        @if($att->status == 'present')
                            <span class="badge bg-success">Present</span>
                        @else
                            <span class="badge bg-danger">Absent</span>
                        @endif
                    </td>

                    <td>{{ $att->check_in ?? '-' }}</td>
                    <td>{{ $att->check_out ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No Attendance Found</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection