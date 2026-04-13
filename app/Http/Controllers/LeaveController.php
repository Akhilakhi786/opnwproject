<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index()
    {
        $employee = Employee::where('user_id', Auth::id())->first();

        $leaves = Leave::where('employee_id', $employee->id)
            ->latest()
            ->get();

        return view('employee.apply-leave', compact('leaves'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
            'reason' => 'required',
        ]);

        $employee = Employee::where('user_id', Auth::id())->first();

        Leave::create([
            'employee_id' => $employee->id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'reason' => $request->reason,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Leave Applied!');
    }

    public function adminIndex()
    {
        $leaves = Leave::with('employee')->latest()->get();

        return view('admin.leave', compact('leaves'));
    }

    public function approve($id)
    {
        Leave::findOrFail($id)->update(['status' => 'approved']);
        return back();
    }

    public function reject($id)
    {
        Leave::findOrFail($id)->update(['status' => 'rejected']);
        return back();
    }
    public function myLeaves()
{
    $leaves = \App\Models\Leave::where('employee_id', auth()->id())->latest()->get();

    return view('employee.my-leaves', compact('leaves'));
}
}