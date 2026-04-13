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
            <option>In Progress</option>
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

                <tr>
                    <td>1</td>
                    <td>Complete Report</td>
                    <td>Prepare monthly report</td>
                    <td>15-04-2026</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td>
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i> View
                        </button>
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-check"></i> Mark Done
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Client Meeting</td>
                    <td>Attend project meeting</td>
                    <td>12-04-2026</td>
                    <td><span class="badge bg-success">Completed</span></td>
                    <td>
                        <button class="btn btn-secondary btn-sm">
                            <i class="fa fa-eye"></i> View
                        </button>
                    </td>
                </tr>

            </tbody>

        </table>
    </div>

</div>

@endsection