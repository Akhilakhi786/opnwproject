@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Add Holiday</h3>

<div class="card p-4 shadow-sm">

    <form action="/admin/add-holiday" method="POST">
        @csrf

        <div class="mb-3">
            <label>Holiday Name</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Save Holiday
        </button>

    </form>

</div>

@endsection