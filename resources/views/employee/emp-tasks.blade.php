@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">My Tasks</h3>

<div class="card p-4 shadow-sm">

    <!-- Filters -->
    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control w-25" placeholder="Search task...">

        <select class="form-control w-25">
            <option>All Status</option>
            <option>Pending</option>
            <option>Completed</option>
        </select>
    </div>

    <!-- Tasks Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Task Title</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($tasks as $key => $task)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->deadline }}</td>

                    <td>
                        @if($task->status == 'Pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @else
                            <span class="badge bg-success">Completed</span>
                        @endif
                    </td>

                    <td>
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i> View
                        </button>

                        @if($task->status == 'Pending')
                        <a href="/employee/task/done/{{ $task->id }}" class="btn btn-success btn-sm">
                            <i class="fa fa-check"></i> Mark Done
                        </a>
                        @endif
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center">No tasks found</td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection