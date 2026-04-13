@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">Holidays</h3>

<div class="card p-4 shadow-sm">

    <!-- Search -->
    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control w-25" placeholder="Search holiday...">
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Holiday Name</th>
                    <th>Date</th>
                    <th>Day</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>1</td>
                    <td>New Year</td>
                    <td>01-01-2026</td>
                    <td>Thursday</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Republic Day</td>
                    <td>26-01-2026</td>
                    <td>Monday</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Independence Day</td>
                    <td>15-08-2026</td>
                    <td>Saturday</td>
                </tr>

            </tbody>

        </table>
    </div>

</div>

@endsection