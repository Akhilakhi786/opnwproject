@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">My Documents</h3>

<div class="card p-4 shadow-sm">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Document</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            @forelse($documents as $key => $doc)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $doc->title }}</td>
                    <td>{{ $doc->type }}</td>
                    <td>{{ $doc->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No documents found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection