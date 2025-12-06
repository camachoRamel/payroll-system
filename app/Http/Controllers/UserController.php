<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PayrollRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function employerDashboard()
    {

        $payroll_records = Employee::with('payrollRecord')
        ->join('payroll_records', 'employees.id', '=', 'payroll_records.employee_id')
        ->where('employer_id', Auth::id())
        ->whereNull('payroll_records.deleted_at')
        ->limit(5)
        ->get();
        $employees = Employee::where('employer_id', Auth::id())
        ->orderBy('hired_at', 'desc')
        ->limit(5)->get();

        return view('employer.dashboard',  compact('payroll_records', 'employees'));
    }

    public function employeeDashboard()
    {
        // get employee based on the equality of last name and username (username is unique)
        $employee = Employee::where('last_name', Auth::user()->username)->first();
        $payroll_records = PayrollRecord::where('employee_id', $employee->id)->orderBy('created_at', 'desc')->get();

        return view('employee.dashboard', compact('payroll_records', 'employee'));
    }
}
