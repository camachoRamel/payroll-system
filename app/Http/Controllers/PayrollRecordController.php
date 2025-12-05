<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PayrollRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrollRecordController extends Controller
{
    public function index()
    {
        // get all employees that the employer handles and their corresponding record in payroll_records table
        $payroll_records = Employee::join('payroll_records', 'employees.id', '=', 'payroll_records.employee_id')
        ->where('employer_id', Auth::id())
        ->whereNull('payroll_records.deleted_at')
        ->orderBy('payroll_records.created_at', 'desc')
        ->get();


        return view('employer.payroll', compact('payroll_records'));
    }

    public function addPayrollForm()
    {
        $payroll_records = Employee::where('employer_id', Auth::id())->get();

        return view('employer.add-payroll', compact('payroll_records'));
    }

    public function addPayroll(Request $request)
    {
        $validated = $request->validate([
            'employee' => 'required',
            'month' => 'required',
            'year' => 'required',
            'baseSalary' => 'required',
            'allowances' => 'required',
            'deductions' => 'required',
            'netSalary' => 'required'
        ]);

        // convert to float
        $temp = floatval($validated['netSalary']);

        PayrollRecord::create([
            'employee_id' => $validated['employee'],
            'period' => $validated['year'] . "/" . $validated['month'],
            'allowance' => $validated['allowances'],
            'deductions' => $validated['deductions'],
            'net_salary' => $temp
        ]);

        return redirect()->route('employer.payroll')->with('success', 'Payroll Record created.');
    }

    public function deletePayroll($id)
    {
        $employee = PayrollRecord::find($id)->delete();

        return redirect()->route('employer.payroll')->with('success', 'Payroll Record Deleted');
    }

    public function getEmployee(int $employeeId)
    {
        $employee = Employee::find($employeeId);

        return response()->json([
            'base_salary' => $employee->base_salary,
        ]);
    }
}
