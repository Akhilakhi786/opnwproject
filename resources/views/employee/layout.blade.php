<!DOCTYPE html>
<html>
<head>
    <title>Employee Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(to bottom, #0f172a, #1e293b);
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #ddd;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 6px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            color: white;
            transform: translateX(5px);
        }

        .active-link {
            background-color: #2563eb;
            color: white !important;
        }

        .content {
            margin-left: 250px;
        }

        .topbar {
            background: white;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .logout-btn {
            width: 100%;
            text-align: left;
            border: none;
            background: transparent;
            color: #f87171;
            padding: 12px 15px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #dc2626;
            color: white;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar p-3 text-white">

        <h4>OPMW HRMS</h4>
        <hr>

        <a href="/employee/dashboard" class="{{ request()->is('employee/dashboard') ? 'active-link' : '' }}">
            <i class="fa fa-home me-2"></i> Dashboard
        </a>

        <a href="/employee/attendance" class="{{ request()->is('employee/attendance') ? 'active-link' : '' }}">
            <i class="fa fa-calendar-check me-2"></i> My Attendance
        </a>

        <a href="/employee/apply-leave" class="{{ request()->is('employee/apply-leave') ? 'active-link' : '' }}">
            <i class="fa fa-file-alt me-2"></i> Apply Leave
        </a>

        <a href="/employee/my-leaves" class="{{ request()->is('employee/my-leaves') ? 'active-link' : '' }}">
            <i class="fa fa-list me-2"></i> My Leaves
        </a>

        <a href="/employee/payslip" class="{{ request()->is('employee/payslip') ? 'active-link' : '' }}">
            <i class="fa fa-money-bill me-2"></i> Payslip / Payroll
        </a>

        <a href="/employee/documents" class="{{ request()->is('employee/documents') ? 'active-link' : '' }}">
            <i class="fa fa-folder me-2"></i> Documents
        </a>

        <a href="/employee/my-documents" class="{{ request()->is('employee/my-documents') ? 'active-link' : '' }}">
            <i class="fa fa-file me-2"></i> My Documents
        </a>

        <a href="/employee/tasks" class="{{ request()->is('employee/tasks') ? 'active-link' : '' }}">
            <i class="fa fa-check-square me-2"></i> Tasks
        </a>

        <a href="/employee/holidays" class="{{ request()->is('employee/holidays') ? 'active-link' : '' }}">
            <i class="fa fa-calendar me-2"></i> Holidays
        </a>

        <a href="/employee/profile" class="{{ request()->is('employee/profile') ? 'active-link' : '' }}">
            <i class="fa fa-user me-2"></i> My Profile
        </a>

        <hr>

        <!-- ✅ FIXED LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>

    </div>

    <!-- Content -->
    <div class="content w-100">

        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between">
            <h5>Employee Panel</h5>
            <div>
                <i class="fa fa-user-circle"></i> {{ auth()->user()->name ?? 'Employee' }}
            </div>
        </div>

        <!-- Page Content -->
        <div class="p-4">
            @yield('content')
        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>