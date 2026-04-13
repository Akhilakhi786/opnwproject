<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    // Show Add Form
    public function create()
    {
        return view('admin.add-employee');
    }

    // Store Employee
    public function store(Request $request)
    {
        // Check if user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'employee',
            ]);
        }

        // Create employee
        Employee::create([
            'user_id' => $user->id,
            'employee_id' => $request->emp_id,
            'name' => $request->name,
            'designation' => $request->designation,
            'department' => $request->department,
            'joining_date' => $request->joining_date,
            'email' => $request->email,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'aadhar' => $request->aadhar,
            'pan' => $request->pan,
            'emergency_contact' => $request->emergency_contact,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'ifsc' => $request->ifsc,
            'salary' => $request->salary,
        ]);

        return back()->with('success', 'Employee Added Successfully!');
    }

    // ✅ EDIT PAGE
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.edit-employee', compact('employee'));
    }

    // ✅ UPDATE EMPLOYEE
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->update([
            'employee_id' => $request->emp_id,
            'name' => $request->name,
            'designation' => $request->designation,
            'department' => $request->department,
            'joining_date' => $request->joining_date,
            'email' => $request->email,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'aadhar' => $request->aadhar,
            'pan' => $request->pan,
            'emergency_contact' => $request->emergency_contact,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'ifsc' => $request->ifsc,
            'salary' => $request->salary,
        ]);

        return redirect('/admin/employees')->with('success', 'Employee Updated!');
    }

    // ✅ DELETE EMPLOYEE
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/admin/employees')->with('success', 'Employee Deleted!');
    }
}