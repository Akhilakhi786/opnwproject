@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Add Employee</h3>

<div class="card p-4 shadow-sm">

    <!-- ✅ FIXED FORM -->
    <form method="POST" action="/admin/add-employee">
        @csrf

        <!-- Employee Profile -->
        <h5 class="mb-3 text-primary">Employee Profile</h5>

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Employee ID</label>
                <input type="text" name="emp_id" class="form-control" placeholder="Enter ID">
            </div>

            <div class="col-md-6">
                <label class="form-label">Employee Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>

            <div class="col-md-6">
                <label class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" placeholder="Enter designation">
            </div>

            <div class="col-md-6">
                <label class="form-label">Department</label>
                <input type="text" name="department" class="form-control" placeholder="Enter department">
            </div>

            <div class="col-md-6">
                <label class="form-label">Joining Date</label>
                <input type="date" name="joining_date" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>

            <div class="col-md-12">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
            </div>

        </div>

        <!-- Personal Details -->
        <h5 class="mt-4 mb-3 text-primary">Personal Details</h5>

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter address">
            </div>

            <div class="col-md-6">
                <label class="form-label">Mobile</label>
                <input type="text" name="mobile" class="form-control" placeholder="Enter mobile">
            </div>

            <div class="col-md-6">
                <label class="form-label">Aadhar</label>
                <input type="text" name="aadhar" class="form-control" placeholder="Enter Aadhar">
            </div>

            <div class="col-md-6">
                <label class="form-label">PAN</label>
                <input type="text" name="pan" class="form-control" placeholder="Enter PAN">
            </div>

            <div class="col-md-12">
                <label class="form-label">Emergency Contact</label>
                <input type="text" name="emergency_contact" class="form-control" placeholder="Enter emergency contact">
            </div>

        </div>

        <!-- Bank Details -->
        <h5 class="mt-4 mb-3 text-primary">Bank Details</h5>

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Bank Name</label>
                <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name">
            </div>

            <div class="col-md-6">
                <label class="form-label">Account Number</label>
                <input type="text" name="account_number" class="form-control" placeholder="Enter account number">
            </div>

            <div class="col-md-6">
                <label class="form-label">IFSC</label>
                <input type="text" name="ifsc" class="form-control" placeholder="Enter IFSC">
            </div>

            <div class="col-md-6">
                <label class="form-label">Salary</label>
                <input type="text" name="salary" class="form-control" placeholder="Enter salary">
            </div>

        </div>

        <!-- Submit -->
        <div class="mt-4">
            <button type="submit" class="btn btn-primary px-4">Add Employee</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>

    </form>

</div>

@endsection