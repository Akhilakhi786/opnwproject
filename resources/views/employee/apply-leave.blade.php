@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">Apply Leave</h3>

<div class="card p-4 shadow-sm">

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- FORM -->
    <form method="POST" action="/employee/apply-leave">
        @csrf

        <div class="row mb-3">

            <div class="col-md-4">
                <label>From Date</label>
                <input type="date" name="from_date" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>To Date</label>
                <input type="date" name="to_date" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Reason</label>
                <input type="text" name="reason" class="form-control" required>
            </div>

        </div>

        <button class="btn btn-primary">Apply Leave</button>
    </form>

    <!-- TABLE -->
    <hr>

    <h5 class="mb-3">My Leaves</h5>

    <div class="table-responsive">
        <table class="table table-bordered">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($leaves as $leave)
                <tr>
                    <td>{{ $loop->iteration }}</td>
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
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No Leaves Found</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection