@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">My Leaves</h3>

<div class="card p-4 shadow-sm">

    <div class="table-responsive">
        <table class="table table-bordered table-hover">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Reason</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($leaves as $key => $leave)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>{{ $leave->from_date }}</td>
                    <td>{{ $leave->to_date }}</td>
                    <td>
                        @if($leave->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($leave->status == 'rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-warning">Pending</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No leave records</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection