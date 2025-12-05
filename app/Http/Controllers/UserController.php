<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // dd('$total_employees');
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
}
