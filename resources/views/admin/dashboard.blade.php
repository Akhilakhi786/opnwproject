@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Dashboard Overview</h3>

<!-- STATS CARDS -->
<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <i class="fa fa-users fa-2x text-primary mb-2"></i>
            <h6>Total Employees</h6>
            <h3 class="fw-bold">120</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <i class="fa fa-check-circle fa-2x text-success mb-2"></i>
            <h6>Present Today</h6>
            <h3 class="fw-bold">95</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <i class="fa fa-bed fa-2x text-warning mb-2"></i>
            <h6>On Leave</h6>
            <h3 class="fw-bold">10</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <i class="fa fa-times-circle fa-2x text-danger mb-2"></i>
            <h6>Absent</h6>
            <h3 class="fw-bold">15</h3>
        </div>
    </div>

</div>


<!-- CHARTS -->
<div class="row g-4">

    <!-- Attendance Chart -->
    <div class="col-md-6">
        <div class="card p-4">
            <h5 class="mb-3">Attendance Overview</h5>
            <canvas id="attendanceChart"></canvas>
        </div>
    </div>

    <!-- Leave Chart -->
    <div class="col-md-6">
        <div class="card p-4">
            <h5 class="mb-3">Leave Distribution</h5>
            <canvas id="leaveChart"></canvas>
        </div>
    </div>

</div>

@endsection


@section('scripts')

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Bar Chart
    new Chart(document.getElementById('attendanceChart'), {
        type: 'bar',
        data: {
            labels: ['Present', 'Absent', 'Leave'],
            datasets: [{
                data: [95, 15, 10]
            }]
        }
    });

    // Pie Chart
    new Chart(document.getElementById('leaveChart'), {
        type: 'doughnut',
        data: {
            labels: ['Sick', 'Casual', 'Annual'],
            datasets: [{
                data: [5, 3, 2]
            }]
        }
    });
</script>

@endsection