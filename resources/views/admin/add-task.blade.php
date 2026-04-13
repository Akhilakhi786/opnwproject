@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Assign Task</h3>

<div class="card p-4 shadow-sm">

    <form>

        <div class="row g-3">

            <div class="col-md-6">
                <label>Task Name</label>
                <input type="text" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Assign To</label>
                <select class="form-control">
                    <option>John Doe</option>
                    <option>Jane Smith</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Priority</label>
                <select class="form-control">
                    <option>High</option>
                    <option>Medium</option>
                    <option>Low</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Deadline</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-12">
                <label>Description</label>
                <textarea class="form-control"></textarea>
            </div>

        </div>

        <div class="mt-4">
            <button class="btn btn-primary">Assign Task</button>
        </div>

    </form>

</div>

@endsection