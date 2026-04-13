<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('employee')->latest()->get();
        $employees = Employee::all();

        return view('admin.payroll', compact('payrolls', 'employees'));
    }

    public function store(Request $request)
    {
        $total = $request->salary + $request->bonus - $request->deductions;

        Payroll::create([
            'employee_id' => $request->employee_id,
            'department' => $request->department,
            'salary' => $request->salary,
            'bonus' => $request->bonus,
            'deductions' => $request->deductions,
            'total' => $total,
        ]);

        return back()->with('success', 'Payroll Added');
    }

    
    public function export()
    {
        $payrolls = Payroll::with('employee')->get();

        $filename = "payroll.csv";
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        $callback = function () use ($payrolls) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['Employee', 'Department', 'Salary', 'Bonus', 'Deductions', 'Total']);

            foreach ($payrolls as $payroll) {
                fputcsv($file, [
                    $payroll->employee->name ?? '',
                    $payroll->department,
                    $payroll->salary,
                    $payroll->bonus,
                    $payroll->deductions,
                    $payroll->total
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    

public function generateSlip($id)
{
    $payroll = Payroll::with('employee')->findOrFail($id);

    $pdf = Pdf::loadView('admin.payroll-slip', compact('payroll'));

    return $pdf->download('salary-slip.pdf');
}
}