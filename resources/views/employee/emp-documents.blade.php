@extends('employee.layout')

@section('content')

<h3 class="mb-4 fw-bold">My Documents</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card p-4 shadow-sm">

    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control w-25" placeholder="Search document...">

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="fa fa-upload"></i> Upload Document
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Document</th>
                    <th>Type</th>
                    <th>Uploaded Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($documents as $key => $doc)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $doc->title }}</td>
                        <td>{{ $doc->type }}</td>
                        <td>{{ \Carbon\Carbon::parse($doc->created_at)->format('d-m-Y') }}</td>
                        <td>
                            <!-- 👁 Preview -->
                            <a href="{{ asset('storage/' . $doc->file) }}" 
                               class="btn btn-primary btn-sm" target="_blank">
                                <i class="fa fa-eye"></i>
                            </a>

                            <!-- ⬇ Download -->
                            <a href="{{ asset('storage/' . $doc->file) }}" 
                               class="btn btn-success btn-sm" download>
                                <i class="fa fa-download"></i>
                            </a>

                            <!-- ❌ Delete -->
                            <a href="/employee/documents/delete/{{ $doc->id }}" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No documents found</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Upload Document</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="/employee/documents/upload" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Document Name</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Type</label>
                        <select name="type" class="form-control" required>
                            <option value="ID Proof">ID Proof</option>
                            <option value="Company">Company</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Upload File</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Upload
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection