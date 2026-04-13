@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Employee Documents</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card p-4 shadow-sm">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Employee</th>
            <th>Document</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach($documents as $key => $doc)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $doc->employee->name ?? '' }}</td>
            <td>{{ $doc->title }}</td>
            <td>{{ $doc->type }}</td>

            <td>
                @if($doc->status == 'approved')
                    <span class="badge bg-success">Approved</span>
                @elseif($doc->status == 'rejected')
                    <span class="badge bg-danger">Rejected</span>
                @else
                    <span class="badge bg-warning">Pending</span>
                @endif
            </td>

            <td>
                <a href="{{ asset('storage/'.$doc->file) }}" target="_blank" class="btn btn-primary btn-sm">
                    View
                </a>

                @if($doc->status == 'pending')
                    <a href="/admin/documents/approve/{{ $doc->id }}" class="btn btn-success btn-sm">Approve</a>
                    <a href="/admin/documents/reject/{{ $doc->id }}" class="btn btn-danger btn-sm">Reject</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>

@endsection