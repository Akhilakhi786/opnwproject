@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Screen Recording</h3>

<div class="card p-4 shadow-sm text-center">

    <h5 class="mb-3">Record Employee Screen Activity</h5>

    <p class="text-muted">Click below to start recording</p>

    <button class="btn btn-danger px-4" onclick="startRecording()">
        <i class="fa fa-circle"></i> Start Recording
    </button>

    <button class="btn btn-secondary px-4 mt-2" onclick="stopRecording()">
        Stop Recording
    </button>

    <video id="preview" class="mt-4 w-100" controls></video>

</div>

@endsection

@section('scripts')

<script>
let mediaRecorder;
let chunks = [];

async function startRecording() {
    const stream = await navigator.mediaDevices.getDisplayMedia({ video: true });

    mediaRecorder = new MediaRecorder(stream);

    mediaRecorder.ondataavailable = e => {
        chunks.push(e.data);
    };

    mediaRecorder.onstop = () => {
        const blob = new Blob(chunks, { type: 'video/webm' });
        const videoURL = URL.createObjectURL(blob);
        document.getElementById('preview').src = videoURL;
    };

    mediaRecorder.start();
}

function stopRecording() {
    mediaRecorder.stop();
}
</script>

@endsection