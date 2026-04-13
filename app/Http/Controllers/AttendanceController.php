<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // ✅ EMPLOYEE ATTENDANCE PAGE
    public function index()
    {
        $employee = Employee::where('user_id', Auth::id())->first();

        if (!$employee) {
            return back()->with('error', 'Employee not found!');
        }

        $attendances = Attendance::where('employee_id', $employee->id)
            ->orderBy('date', 'desc')
            ->get();

        return view('employee.attendance', compact('attendances'));
    }

    // ✅ STORE (CHECK-IN / CHECK-OUT)
    public function store(Request $request)
    {
        $employee = Employee::where('user_id', Auth::id())->first();

        if (!$employee) {
            return back()->with('error', 'Employee not found!');
        }

        $today = now()->toDateString();

        $attendance = Attendance::where('employee_id', $employee->id)
            ->where('date', $today)
            ->first();

        // ✅ FIRST CLICK → CHECK-IN
        if (!$attendance) {
            Attendance::create([
                'employee_id' => $employee->id,
                'date' => $today,
                'status' => 'present',
                'check_in' => now()->format('H:i:s'),
            ]);

            return back()->with('success', 'Checked In Successfully!');
        }

        // ✅ SECOND CLICK → CHECK-OUT
        if ($attendance && !$attendance->check_out) {
            $attendance->update([
                'check_out' => now()->format('H:i:s'),
            ]);

            return back()->with('success', 'Checked Out Successfully!');
        }

        // ❌ THIRD CLICK BLOCK
        return back()->with('error', 'Attendance already completed for today!');
    }

    // ✅ ADMIN ATTENDANCE PAGE
    public function adminIndex()
    {
        $attendances = Attendance::with('employee')
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.attendance', compact('attendances'));
    }

    // ✅ DOWNLOAD CSV (🔥 NEW)
    public function download()
    {
        $attendances = Attendance::with('employee')->get();

        $filename = "attendance.csv";
        $handle = fopen($filename, 'w+');

        // Header
        fputcsv($handle, [
            'Employee ID',
            'Name',
            'Department',
            'Status',
            'Check In',
            'Check Out'
        ]);

        // Data
        foreach ($attendances as $att) {
            fputcsv($handle, [
                $att->employee->employee_id,
                $att->employee->name,
                $att->employee->department,
                $att->status,
                $att->check_in,
                $att->check_out,
            ]);
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}