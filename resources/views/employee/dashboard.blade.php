@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">Employee Dashboard</h3>

<div class="row">

    <!-- Tasks -->
    <div class="col-md-4">
        <div class="card bg-primary text-white p-3 shadow">
            <h5>My Tasks</h5>
            <h3>
                {{ \App\Models\Task::where('employee_id', auth()->user()->id)->count() }}
            </h3>
        </div>
    </div>

    <!-- Leaves -->
    <div class="col-md-4">
        <div class="card bg-warning text-dark p-3 shadow">
            <h5>My Leaves</h5>
            <h3>
                {{ \App\Models\Leave::where('employee_id', auth()->user()->id)->count() }}
            </h3>
        </div>
    </div>

    <!-- Documents -->
    <div class="col-md-4">
        <div class="card bg-success text-white p-3 shadow">
            <h5>My Documents</h5>
            <h3>
                {{ \App\Models\Document::where('employee_id', auth()->user()->id)->count() }}
            </h3>
        </div>
    </div>

</div>

@endsection