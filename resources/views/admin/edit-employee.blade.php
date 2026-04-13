@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Edit Employee</h3>

<div class="card p-4 shadow-sm">

    <form method="POST" action="/admin/employees/update/{{ $employee->id }}">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label>Employee ID</label>
                <input type="text" name="emp_id" class="form-control"
                       value="{{ $employee->employee_id }}">
            </div>

            <div class="col-md-6">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ $employee->name }}">
            </div>

            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $employee->email }}">
            </div>

            <div class="col-md-6">
                <label>Department</label>
                <input type="text" name="department" class="form-control"
                       value="{{ $employee->department }}">
            </div>

            <div class="col-md-6">
                <label>Designation</label>
                <input type="text" name="designation" class="form-control"
                       value="{{ $employee->designation }}">
            </div>

            <div class="col-md-6">
                <label>Salary</label>
                <input type="text" name="salary" class="form-control"
                       value="{{ $employee->salary }}">
            </div>

        </div>

        <div class="mt-4">
            <button class="btn btn-success">Update Employee</button>
        </div>

    </form>

</div>

@endsection