@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">My Profile</h3>

<div class="row">

    <!-- Profile Card -->
    <div class="col-md-4">
        <div class="card shadow-sm p-4 text-center border-0">

            <img src="https://i.pravatar.cc/150"
                 class="rounded-circle mb-3"
                 width="120" height="120">

            <h5 class="fw-bold">John Doe</h5>
            <p class="text-muted">Software Developer</p>

            <span class="badge bg-success mb-3">Active</span>

            <button class="btn btn-primary w-100">
                <i class="fa fa-edit"></i> Edit Profile
            </button>

        </div>
    </div>

    <!-- Details -->
    <div class="col-md-8">
        <div class="card shadow-sm p-4 border-0">

            <h5 class="mb-3">Personal Details</h5>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="text" class="form-control" value="john@example.com" readonly>
                </div>

                <div class="col-md-6">
                    <label>Phone</label>
                    <input type="text" class="form-control" value="9876543210" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Department</label>
                    <input type="text" class="form-control" value="IT" readonly>
                </div>

                <div class="col-md-6">
                    <label>Joining Date</label>
                    <input type="text" class="form-control" value="01-01-2025" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label>Address</label>
                <textarea class="form-control" rows="3" readonly>
Hyderabad, India
                </textarea>
            </div>

        </div>
    </div>

</div>

@endsection