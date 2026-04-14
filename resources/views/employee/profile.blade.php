@extends('employee.layout')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h3 class="mb-4 fw-bold">My Profile</h3>

<div class="row">

    <!-- Profile Card -->
    <div class="col-md-4">
        <div class="card shadow-sm p-4 text-center border-0">

            <img src="https://i.pravatar.cc/150"
                 class="rounded-circle mb-3"
                 width="120" height="120">

            <h5 class="fw-bold">
                {{ $employee->name ?? 'N/A' }}
            </h5>

            <p class="text-muted">
                {{ $employee->department ?? 'Employee' }}
            </p>

            <span class="badge bg-success mb-3">Active</span>

            <!-- ✅ FIXED BUTTON -->
            <a href="/employee/profile/edit" class="btn btn-primary w-100">
                <i class="fa fa-edit"></i> Edit Profile
            </a>

        </div>
    </div>

    <!-- Details -->
    <div class="col-md-8">
        <div class="card shadow-sm p-4 border-0">

            <h5 class="mb-3">Personal Details</h5>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="text" class="form-control"
                        value="{{ $employee->email ?? '' }}" readonly>
                </div>

                <div class="col-md-6">
                    <label>Phone</label>
                    <input type="text" class="form-control"
                        value="{{ $employee->phone ?? '' }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Department</label>
                    <input type="text" class="form-control"
                        value="{{ $employee->department ?? '' }}" readonly>
                </div>

                <div class="col-md-6">
                    <label>Joining Date</label>
                    <input type="text" class="form-control"
                        value="{{ $employee && $employee->joining_date ? \Carbon\Carbon::parse($employee->joining_date)->format('d-m-Y') : '' }}" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label>Address</label>
                <textarea class="form-control" rows="3" readonly>
{{ $employee->address ?? '' }}
                </textarea>
            </div>

        </div>
    </div>

</div>

@endsection