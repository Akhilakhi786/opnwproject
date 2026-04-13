@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Employees List</h3>

<div class="card p-4 shadow-sm">

    <!-- Top Bar -->
    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control w-25" placeholder="Search...">

        <a href="/admin/add-employee" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Employee
        </a>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered align-middle">

            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>

           <tbody>
@forelse($employees as $emp)
<tr>
    <td>{{ $emp->employee_id }}</td>
    <td>{{ $emp->name }}</td>
    <td>{{ $emp->email }}</td>
    <td>{{ $emp->department }}</td>
    <td>{{ $emp->designation }}</td>
    <td>{{ $emp->salary }}</td>
   <td>
    <a href="/admin/employees/edit/{{ $emp->id }}" class="btn btn-warning btn-sm">Edit</a>

    <a href="/admin/employees/delete/{{ $emp->id }}"
       onclick="return confirm('Are you sure?')"
       class="btn btn-danger btn-sm">
        Delete
    </a>
</td> 
</tr>
@empty
<tr>
    <td colspan="7" class="text-center">No Employees Found</td>
</tr>
@endforelse
</tbody>

        </table>
    </div>

</div>

@endsection