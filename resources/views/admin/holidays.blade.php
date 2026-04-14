@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Holidays</h3>

<div class="card p-4 shadow-sm">

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <div class="d-flex justify-content-between mb-3">
        <h5>Holiday List</h5>

        <a href="/admin/add-holiday" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Holiday
        </a>
    </div>

    <!-- Table -->
    <table class="table table-bordered">

        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Holiday Name</th>
                <th>Date</th>
                <th>Day</th>
                <th>Action</th> <!-- NEW -->
            </tr>
        </thead>

        <tbody>
            @forelse($holidays as $key => $h)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $h->title }}</td>
                <td>{{ \Carbon\Carbon::parse($h->date)->format('d-m-Y') }}</td>
                <td>{{ $h->day }}</td>
                <td>
                    <a href="/admin/holiday/delete/{{ $h->id }}"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure to delete this holiday?')">
                        Delete
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No holidays found</td>
            </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection