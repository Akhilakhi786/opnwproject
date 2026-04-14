<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\HolidayController;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Task;
use App\Models\Holiday;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('login');
});

/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/employee/dashboard');
})->middleware('auth');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', fn() => view('admin.dashboard'));

    // EMPLOYEES
    Route::get('/admin/add-employee', [EmployeeController::class, 'create']);
    Route::post('/admin/add-employee', [EmployeeController::class, 'store']);

    Route::get('/admin/employees', function () {
        $employees = Employee::latest()->get();
        return view('admin.employees', compact('employees'));
    });

    Route::get('/admin/employees/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/admin/employees/update/{id}', [EmployeeController::class, 'update']);
    Route::get('/admin/employees/delete/{id}', [EmployeeController::class, 'destroy']);

    // ATTENDANCE
    Route::get('/admin/attendance', [AttendanceController::class, 'adminIndex']);
    Route::get('/admin/attendance/download', [AttendanceController::class, 'download']);

    // LEAVE
    Route::get('/admin/leave', [LeaveController::class, 'adminIndex']);
    Route::get('/admin/leave/approve/{id}', [LeaveController::class, 'approve']);
    Route::get('/admin/leave/reject/{id}', [LeaveController::class, 'reject']);

    // DOCUMENTS
    Route::get('/admin/documents', [DocumentController::class, 'adminIndex']);
    Route::get('/admin/documents/approve/{id}', [DocumentController::class, 'approve']);
    Route::get('/admin/documents/reject/{id}', [DocumentController::class, 'reject']);

    // PAYROLL
    Route::get('/admin/payroll', [PayrollController::class, 'index']);
    Route::post('/admin/payroll/store', [PayrollController::class, 'store']);
    Route::get('/admin/payroll/delete/{id}', [PayrollController::class, 'destroy']);
    Route::get('/admin/payroll/export', [PayrollController::class, 'export']);
    Route::get('/admin/payroll/slip/{id}', [PayrollController::class, 'generateSlip']);

    // TASKS
    Route::get('/admin/tasks', fn() => view('admin.tasks'));

    Route::post('/admin/tasks/store', function (Request $request) {
        Task::create([
            'employee_id' => $request->employee_id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => 'Pending',
        ]);

        return back()->with('success', 'Task Assigned');
    });

    // HOLIDAYS
    Route::get('/admin/add-holiday', [HolidayController::class, 'create']);
    Route::post('/admin/add-holiday', [HolidayController::class, 'store']);

    Route::get('/admin/holidays', function () {
        $holidays = Holiday::latest()->get();
        return view('admin.holidays', compact('holidays'));
    });

    Route::get('/admin/holiday/delete/{id}', function ($id) {
        Holiday::findOrFail($id)->delete();
        return back();
    });

    Route::get('/admin/screen-record', fn() => view('admin.screen-record'));
});


/*
|--------------------------------------------------------------------------
| EMPLOYEE ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:employee'])->group(function () {

    Route::get('/employee/dashboard', fn() => view('employee.dashboard'));

    // ATTENDANCE
    Route::get('/employee/attendance', [AttendanceController::class, 'index']);
    Route::post('/employee/attendance', [AttendanceController::class, 'store']);

    // LEAVE
    Route::get('/employee/apply-leave', [LeaveController::class, 'index']);
    Route::post('/employee/apply-leave', [LeaveController::class, 'store']);
    Route::get('/employee/my-leaves', [LeaveController::class, 'myLeaves']);

    // DOCUMENTS
    Route::get('/employee/documents', [DocumentController::class, 'index']);
    Route::get('/employee/my-documents', [DocumentController::class, 'myDocuments']);
    Route::post('/employee/documents/upload', [DocumentController::class, 'store']);
    Route::get('/employee/documents/delete/{id}', [DocumentController::class, 'destroy']);

    // PAYSLIP
    Route::get('/employee/payslip', function () {

        $employee = Employee::where('user_id', auth()->id())->first();

        if (!$employee) {
            return back()->with('error', 'Employee not found');
        }

        $payrolls = Payroll::where('employee_id', $employee->id)->get();

        return view('employee.payslip', compact('payrolls'));
    });

    // TASKS
    Route::get('/employee/tasks', function () {

        $employee = Employee::where('user_id', auth()->id())->first();

        if (!$employee) {
            return back()->with('error', 'Employee not found');
        }

        $tasks = Task::where('employee_id', $employee->id)->get();

        return view('employee.emp-tasks', compact('tasks'));
    });

    Route::get('/employee/task/done/{id}', function ($id) {
        Task::findOrFail($id)->update(['status' => 'Completed']);
        return back();
    });

    // HOLIDAYS
    Route::get('/employee/holidays', function () {
        $holidays = Holiday::latest()->get();
        return view('employee.emp-holidays', compact('holidays'));
    });

    // PROFILE VIEW
    Route::get('/employee/profile', function () {

        $employee = Employee::where('user_id', auth()->id())->first();

        if (!$employee) {
            return back()->with('error', 'Employee not found');
        }

        return view('employee.profile', compact('employee'));
    });

    // EDIT PROFILE
    Route::get('/employee/profile/edit', function () {

        $employee = Employee::where('user_id', auth()->id())->first();

        return view('employee.edit-profile', compact('employee'));
    });

    // UPDATE PROFILE
    Route::post('/employee/profile/update', function (Request $request) {

        $employee = Employee::where('user_id', auth()->id())->first();

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'joining_date' => $request->joining_date,
            'address' => $request->address,
        ]);

        return redirect('/employee/profile')->with('success', 'Profile Updated');
    });
});


/*
|--------------------------------------------------------------------------
| PROFILE (Laravel default)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';