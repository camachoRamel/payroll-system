<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PayrollRecordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/', [LoginController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('registerForm');
Route::post('/register', [LoginController::class, 'register'])->name('register');


// EMPLOYER OR ADMIN ROUTES
Route::get('/dashboard', [UserController::class, 'index'])->name('employer.dashboard');

// ROUTE FOR EMPLOYEE MANAGEMENT
Route::get('/employees',[EmployeeController::class, 'index'])->name('employer.employees');
Route::get('/add-employee', function() {
    return view('employer.add-employee');
})->name('employer.addEmployeeForm');
Route::post('/add-employee', [EmployeeController::class, 'addEmployee'])->name('employer.addEmployee');
Route::delete('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee'])->name('employer.deleteEmployee');

// ROUTES FOR PAYROLL MANAGEMENT
Route::get('/payroll', [PayrollRecordController::class, 'index'])->name('employer.payroll');
Route::get('/add-payroll', [PayrollRecordController::class, 'addPayrollForm'])->name('employer.addPayrollForm');
Route::get('/payroll/get-employee/{employeeId}', [PayrollRecordController::class, 'getEmployee']);

Route::post('/add-payroll', [PayrollRecordController::class, 'addPayroll'])->name('employer.addPayroll');
Route::delete('/delete-payroll/{id}', [PayrollRecordController::class, 'deletePayroll'])->name('employer.deletePayroll');

