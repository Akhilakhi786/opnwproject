<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
            font-family: 'Segoe UI', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, #0f172a, #020617);
            box-shadow: 4px 0 20px rgba(0,0,0,0.2);
        }

        .sidebar h4 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 12px 18px;
            color: #cbd5f5;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 8px;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .sidebar a i {
            width: 22px;
        }

        /* HOVER */
        .sidebar a:hover {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            color: #fff;
            transform: translateX(6px);
        }

        /* ACTIVE */
        .active-link {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.5);
        }

        /* CONTENT */
        .content {
            margin-left: 260px;
        }

        /* TOPBAR */
        .topbar {
            background: white;
            padding: 14px 25px;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        /* CARDS */
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .btn-link {
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar p-3 text-white">
        <h4>OPMW HRMS</h4>
        <hr>

        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active-link' : '' }}">
            <i class="fa fa-home me-2"></i> Dashboard
        </a>

        <a href="/admin/add-employee" class="{{ request()->is('admin/add-employee') ? 'active-link' : '' }}">
            <i class="fa fa-user-plus me-2"></i> Add Employee
        </a>

        <a href="/admin/employees" class="{{ request()->is('admin/employees') ? 'active-link' : '' }}">
            <i class="fa fa-users me-2"></i> Employees
        </a>

        <a href="/admin/attendance" class="{{ request()->is('admin/attendance') ? 'active-link' : '' }}">
            <i class="fa fa-calendar-check me-2"></i> Attendance
        </a>

        <a href="/admin/leave" class="{{ request()->is('admin/leave') ? 'active-link' : '' }}">
            <i class="fa fa-file-alt me-2"></i> Leave Management
        </a>

        <a href="/admin/payroll" class="{{ request()->is('admin/payroll') ? 'active-link' : '' }}">
            <i class="fa fa-money-bill me-2"></i> Payroll
        </a>

        <a href="/admin/documents" class="{{ request()->is('admin/documents') ? 'active-link' : '' }}">
            <i class="fa fa-folder me-2"></i> Documents
        </a>

        

        <a href="/admin/tasks" class="{{ request()->is('admin/tasks') ? 'active-link' : '' }}">
            <i class="fa fa-check-square me-2"></i> Tasks
        </a>

        <a href="/admin/holidays" class="{{ request()->is('admin/holidays') ? 'active-link' : '' }}">
            <i class="fa fa-calendar me-2"></i> Holidays
        </a>

        <a href="/admin/screen-record" class="{{ request()->is('admin/screen-record') ? 'active-link' : '' }}">
            <i class="fa fa-video me-2"></i> Screen Record
        </a>

        <hr>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-link text-danger">
                <i class="fa fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>

    <!-- CONTENT -->
    <div class="content w-100">

        <!-- TOPBAR -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Admin Panel</h5>
            <div><i class="fa fa-user-circle me-1"></i> Admin</div>
        </div>

        <!-- PAGE CONTENT -->
        <div class="p-4">
            @yield('content')
        </div>

    </div>

</div>
@yield('scripts')
</body>
</html>