<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PayrollController; // ✅ ADDED
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Payroll;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard Redirect (Role Based)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('employee.dashboard');
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    // Employees
    Route::get('/admin/add-employee', [EmployeeController::class, 'create']);
    Route::post('/admin/add-employee', [EmployeeController::class, 'store']);

    Route::get('/admin/employees', function () {
        $employees = Employee::latest()->get();
        return view('admin.employees', compact('employees'));
    });

    Route::get('/admin/employees/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/admin/employees/update/{id}', [EmployeeController::class, 'update']);
    Route::get('/admin/employees/delete/{id}', [EmployeeController::class, 'destroy']);

    // Attendance
    Route::get('/admin/attendance', [AttendanceController::class, 'adminIndex']);
    Route::get('/admin/attendance/download', [AttendanceController::class, 'download']);

    // Leave
    Route::get('/admin/leave', [LeaveController::class, 'adminIndex']);
    Route::get('/admin/leave/approve/{id}', [LeaveController::class, 'approve']);
    Route::get('/admin/leave/reject/{id}', [LeaveController::class, 'reject']);

    // Documents
    Route::get('/admin/documents', [DocumentController::class, 'adminIndex']);
    Route::get('/admin/documents/approve/{id}', [DocumentController::class, 'approve']);
    Route::get('/admin/documents/reject/{id}', [DocumentController::class, 'reject']);

    // ✅ PAYROLL (FINAL)
    Route::get('/admin/payroll', [PayrollController::class, 'index']);
    Route::post('/admin/payroll/store', [PayrollController::class, 'store']);
    Route::post('/admin/payroll/store', [PayrollController::class, 'store']);
    Route::get('/admin/payroll/delete/{id}', [PayrollController::class, 'destroy']);
    Route::get('/admin/payroll/export', [PayrollController::class, 'export']);
    Route::get('/admin/payroll/slip/{id}', [PayrollController::class, 'generateSlip']);
    // Other Pages
    Route::get('/admin/tasks', fn() => view('admin.tasks'));
    Route::get('/admin/holidays', fn() => view('admin.holidays'));
    Route::get('/admin/screen-record', fn() => view('admin.screen-record'));
});

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:employee'])->group(function () {

    Route::get('/employee/dashboard', fn() => view('employee.dashboard'))->name('employee.dashboard');

    // Attendance
    Route::get('/employee/attendance', [AttendanceController::class, 'index']);
    Route::post('/employee/attendance', [AttendanceController::class, 'store']);

    // Leave
    Route::get('/employee/apply-leave', [LeaveController::class, 'index']);
    Route::post('/employee/apply-leave', [LeaveController::class, 'store']);
    Route::get('/employee/my-leaves', [LeaveController::class, 'myLeaves']);
    // Documents
    Route::get('/employee/documents', [DocumentController::class, 'index']);
    Route::get('/employee/my-documents', [DocumentController::class, 'myDocuments']);
    Route::post('/employee/documents/upload', [DocumentController::class, 'store']);
    Route::get('/employee/documents/delete/{id}', [DocumentController::class, 'destroy']);
    Route::get('/employee/payslip', function () {

        $employee = \App\Models\Employee::where('user_id', auth()->id())->first();

        $payrolls = Payroll::where('employee_id', $employee->id)->get();

        return view('employee.payslip', compact('payrolls'));
    });
    // Other Pages
    
    Route::get('/employee/tasks', fn() => view('employee.emp-tasks'));
    Route::get('/employee/holidays', fn() => view('employee.emp-holidays'));
    Route::get('/employee/profile', fn() => view('employee.profile'));
});

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';