<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::where('employer_id', Auth::id())->orderBy('hired_at','desc')->get();

        return view('employer.employees', compact('employees'));
    }

    public function addEmployee(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'required|email',
            'position' => 'required',
            'base_salary' => 'required|numeric|min:0',
            'hired_at' => 'required|date'
        ]);

        $employee = Employee::create([
            'employer_id' => Auth::id(),
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'position' => $validated['position'],
            'base_salary' => $validated['base_salary'],
            'hired_at' => $validated['hired_at']
        ]);

        User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'username' => $validated['last_name'],
            'role' => 0,
            'password' => Hash::make('password')
        ]);

        Log::notice('Successfully created employee');
        return redirect()->route('employer.employees')->with('success', 'Successfully added an employee');
    }

    public function editEmployeeForm($id)
    {
        $employee = Employee::find($id);

        return view('employer.edit-employee', compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'required|email',
            'position' => 'required',
            'base_salary' => 'required|numeric|min:0',
            'hired_at' => 'required|date',
            'status' => 'required',
        ]);

        $employee->update([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'] ?? null,
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'position' => $validated['position'],
            'base_salary' => $validated['base_salary'],
            'hired_at' => $validated['hired_at'],
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('employer.employees')
            ->with('success', 'Employee updated successfully.');
    }


    public function deleteEmployee($id)
    {
        $employee = Employee::find($id)->delete();

        return redirect()->route('employer.employees')->with('success', 'Employee deleted');
    }
}
