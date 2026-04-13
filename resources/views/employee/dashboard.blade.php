@extends('employee.layout')

@section('content')

<h4 class="mb-4 gradient-text">Dashboard Overview</h4>

<!-- Stats -->
<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="glass-card text-center">
            <h6>Total Tasks</h6>
            <h2>8</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="glass-card text-center">
            <h6>Completed</h6>
            <h2 class="text-success">5</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="glass-card text-center">
            <h6>Pending</h6>
            <h2 class="text-warning">3</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="glass-card text-center">
            <h6>Attendance</h6>
            <h2 class="text-info">92%</h2>
        </div>
    </div>

</div>

<!-- Charts -->
<div class="row g-4">

    <div class="col-md-6">
        <div class="glass-card">
            <h6>Attendance</h6>
            <canvas id="barChart"></canvas>
        </div>
    </div>

    <div class="col-md-6">
        <div class="glass-card">
            <h6>Task Status</h6>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

</div>

<!-- Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: ['Present', 'Absent', 'Leave'],
        datasets: [{
            data: [20, 3, 2],
            backgroundColor: ['#22c55e', '#ef4444', '#f59e0b']
        }]
    }
});

new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: {
        labels: ['Completed', 'Pending'],
        datasets: [{
            data: [5, 3],
            backgroundColor: ['#22c55e', '#f59e0b']
        }]
    }
});
</script>

@endsection