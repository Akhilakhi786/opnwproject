@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Leave Management</h3>

<div class="card p-4 shadow-sm">

    <div class="table-responsive">
        <table class="table table-bordered">

            <thead class="table-light">
                <tr>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($leaves as $leave)
                <tr>
                    <td>{{ $leave->employee->name }}</td>
                    <td>{{ $leave->employee->department }}</td>
                    <td>{{ $leave->from_date }}</td>
                    <td>{{ $leave->to_date }}</td>
                    <td>{{ $leave->reason }}</td>

                    <td>
                        @if($leave->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($leave->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>

                    <td>
                        @if($leave->status == 'pending')
                            <a href="/admin/leave/approve/{{ $leave->id }}" class="btn btn-success btn-sm">Approve</a>
                            <a href="/admin/leave/reject/{{ $leave->id }}" class="btn btn-danger btn-sm">Reject</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No Leave Requests</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection