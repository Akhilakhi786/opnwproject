<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;

class TaskController extends Controller
{
    public function index()
    {
        $employee = Employee::where('user_id', auth()->id())->first();

        $tasks = Task::where('employee_id', $employee->id)->get();

        return view('employee.emp-tasks', compact('tasks'));
    }

    public function markDone($id)
    {
        Task::findOrFail($id)->update([
            'status' => 'Completed'
        ]);

        return back();
    }
}