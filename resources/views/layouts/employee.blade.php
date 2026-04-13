<!DOCTYPE html>
<html>
<head>
    <title>Employee Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body { background-color: #f4f6f9; }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(to bottom, #0f172a, #1e293b);
        }

        .sidebar a {
            padding: 10px 15px;
            display: flex;
            align-items: center;
            color: #ddd;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background-color: #2563eb;
            color: white;
        }

        .active-link {
            background-color: #2563eb;
            color: white !important;
        }

        .content { margin-left: 250px; }

        .topbar {
            background: white;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="text-white p-3 sidebar">
        <h4>HRMS</h4>
        <hr>

        <a href="/employee/dashboard">Dashboard</a>
        <a href="/employee/attendance">My Attendance</a>
        <a href="/employee/apply-leave">Apply Leave</a>
        <a href="/employee/my-leaves">My Leaves</a>
        <a href="/employee/payslip">Payslip</a>

        <a href="/employee/documents">Documents</a>
        <a href="/employee/my-documents">My Documents</a>
        <a href="/employee/tasks">Tasks</a>
        <a href="/employee/holidays">Holidays</a>
        <a href="/employee/profile">My Profile</a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-link text-danger mt-3">
                Logout
            </button>
        </form>
    </div>

    <!-- Content -->
    <div class="content w-100">

        <div class="topbar d-flex justify-content-between">
            <h5>Employee Panel</h5>
            <div>Employee</div>
        </div>

        <div class="p-4">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>