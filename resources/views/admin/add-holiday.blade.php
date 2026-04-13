@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Add Holiday</h3>

<div class="card p-4 shadow-sm">

    <form>

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Holiday Name</label>
                <input type="text" class="form-control" placeholder="Enter holiday name">
            </div>

            <div class="col-md-6">
                <label class="form-label">Date</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Day</label>
                <input type="text" class="form-control" placeholder="e.g. Monday">
            </div>

        </div>

        <div class="mt-4">
            <button class="btn btn-primary px-4">Save Holiday</button>
        </div>

    </form>

</div>

@endsection