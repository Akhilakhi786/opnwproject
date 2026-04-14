@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">Edit Profile</h3>

<div class="card p-4 shadow-sm">

    <form action="/employee/profile/update" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $employee->name }}" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $employee->email }}" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Department</label>
                <input type="text" name="department" value="{{ $employee->department }}" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Joining Date</label>
                <input type="date" name="joining_date" value="{{ $employee->joining_date }}" class="form-control">
            </div>

            <div class="col-md-12 mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ $employee->address }}</textarea>
            </div>

        </div>

        <button type="submit" class="btn btn-success">
            Update Profile
        </button>

    </form>

</div>

@endsection