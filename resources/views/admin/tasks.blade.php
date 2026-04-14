@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Assign Tasks</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card p-4 shadow-sm">

    <!-- Add Task -->
    <form action="/admin/tasks/store" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-3">
                <label>Employee</label>
                <select name="employee_id" class="form-control" required>
                    @foreach(\App\Models\Employee::all() as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Task Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label>Deadline</label>
                <input type="date" name="deadline" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label>Description</label>
                <input type="text" name="description" class="form-control" required>
            </div>

        </div>

        <button class="btn btn-primary mt-3">Assign Task</button>
    </form>

</div>

@endsection