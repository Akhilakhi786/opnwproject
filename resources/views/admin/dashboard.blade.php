@extends('admin.layout')

@section('content')

<h3 class="mb-4 fw-bold">Admin Dashboard</h3>

<!-- 🔥 MODERN CARDS -->
<div class="row g-4">

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 p-3 text-center">
            <h6 class="text-muted">Employees</h6>
            <h2 class="fw-bold text-primary">
                {{ \App\Models\Employee::count() }}
            </h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 p-3 text-center">
            <h6 class="text-muted">Pending Leaves</h6>
            <h2 class="fw-bold text-warning">
                {{ \App\Models\Leave::where('status','pending')->count() }}
            </h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 p-3 text-center">
            <h6 class="text-muted">Pending Documents</h6>
            <h2 class="fw-bold text-info">
                {{ \App\Models\Document::where('status','pending')->count() }}
            </h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 p-3 text-center">
            <h6 class="text-muted">Total Payroll</h6>
            <h2 class="fw-bold text-success">
                ₹{{ \App\Models\Payroll::sum('total') }}
            </h2>
        </div>
    </div>

</div>

<!-- 🔥 CHART SECTION -->
<div class="card mt-4 p-4 shadow rounded-4">
    <h5 class="mb-3">System Overview</h5>
    <canvas id="dashboardChart"></canvas>
</div>

<!-- 🔥 RECENT ACTIVITY (OPTIONAL BONUS) -->
<div class="card mt-4 p-4 shadow rounded-4">
    <h5 class="mb-3">Recent Employees</h5>

    <ul class="list-group">
        @foreach(\App\Models\Employee::latest()->take(5)->get() as $emp)
            <li class="list-group-item d-flex justify-content-between">
                {{ $emp->name }}
                <span class="text-muted">
    {{ $emp->created_at ? $emp->created_at->diffForHumans() : 'No date' }}
</span>
            </li>
        @endforeach
    </ul>
</div>

<!-- 🔥 CHART SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('dashboardChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Employees', 'Leaves', 'Documents', 'Tasks'],
        datasets: [{
            label: 'System Data',
            data: [
                {{ \App\Models\Employee::count() }},
                {{ \App\Models\Leave::count() }},
                {{ \App\Models\Document::count() }},
                {{ \App\Models\Task::count() }}
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});
</script>

<!-- 🔥 HOVER EFFECT -->
<style>
.card:hover {
    transform: scale(1.03);
    transition: 0.3s;
}
</style>

@endsection