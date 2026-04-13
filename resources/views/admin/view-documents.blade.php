@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">View Documents</h3>

<div class="card p-4 shadow-sm">

    <!-- Filters -->
    <div class="d-flex justify-content-between mb-3">
        <select class="form-control w-25">
            <option>All Employees</option>
            <option>John Doe</option>
            <option>Jane Smith</option>
        </select>

        <input type="date" class="form-control w-25">
    </div>

    <!-- Documents Grid -->
    <div class="row">

        <!-- Document Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm p-3">
                <h6>Aadhar Card</h6>
                <p class="text-muted mb-1">John Doe</p>
                <small class="text-muted">Uploaded: 10-04-2026</small>

                <div class="mt-3 d-flex justify-content-between">
                    <button class="btn btn-success btn-sm">
                        <i class="fa fa-download"></i> Download
                    </button>

                    <button class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Document Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm p-3">
                <h6>Offer Letter</h6>
                <p class="text-muted mb-1">Jane Smith</p>
                <small class="text-muted">Uploaded: 08-04-2026</small>

                <div class="mt-3 d-flex justify-content-between">
                    <button class="btn btn-success btn-sm">
                        <i class="fa fa-download"></i> Download
                    </button>

                    <button class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection