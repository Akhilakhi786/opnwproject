@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">My Attendance</h3>

<div class="card p-4 shadow-sm">

    {{-- SUCCESS / ERROR --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- ACTION BUTTON --}}
    <div class="d-flex gap-3 mb-4">

        <form method="POST" action="/employee/attendance">
            @csrf
            <button class="btn btn-success">
                <i class="fa fa-sign-in-alt"></i> Check In / Check Out
            </button>
        </form>

        {{-- TODAY STATUS --}}
        @php
            $today = now()->toDateString();
            $todayAttendance = $attendances->where('date', $today)->first();
        @endphp

        @if($todayAttendance)
            <span class="badge bg-success p-2">
                Status: {{ ucfirst($todayAttendance->status) }}
            </span>
        @else
            <span class="badge bg-warning text-dark p-2">
                Status: Not Marked
            </span>
        @endif

    </div>

    {{-- TABLE --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                </tr>
            </thead>

            <tbody>
                @forelse($attendances as $index => $att)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($att->date)->format('d-m-Y') }}</td>

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
                    <td colspan="5" class="text-center">No Attendance Found</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection