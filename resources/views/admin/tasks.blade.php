@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Task Management</h3>

<div class="card p-4 shadow-sm">

    <!-- Top Actions -->
     <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control w-25" placeholder="Search Task...">

     <a href="/admin/add-task" class="btn btn-primary">
     <i class="fa fa-plus"></i> Assign Task
     </a>
     </div>

    <!-- Tasks Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Assigned To</th>
                    <th>Priority</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>1</td>
                    <td>Update Website UI</td>
                    <td>John Doe</td>
                    <td><span class="badge bg-danger">High</span></td>
                    <td>15-04-2026</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>
                        <button class="btn btn-info btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Prepare Payroll Report</td>
                    <td>Jane Smith</td>
                    <td><span class="badge bg-success">Low</span></td>
                    <td>12-04-2026</td>
                    <td><span class="badge bg-primary">In Progress</span></td>
                    <td>
                        <button class="btn btn-info btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Employee Onboarding</td>
                    <td>Alex</td>
                    <td><span class="badge bg-warning">Medium</span></td>
                    <td>10-04-2026</td>
                    <td><span class="badge bg-success">Completed</span></td>
                    <td>
                        <button class="btn btn-info btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>

            </tbody>

        </table>
    </div>

</div>

@endsection