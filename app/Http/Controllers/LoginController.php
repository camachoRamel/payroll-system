<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            if(Auth::user()->role === 1){
                Log::notice('Employer Successfully Logged in');
                return redirect()->route('employer.dashboard');

            }else {
                Log::notice('Employee Successfully Logged in');
                return redirect()->route('employee.dashboard');

            }
        }
        return redirect('/')->with('error', 'Incorrect password or username');
    }
    public function register(Request $request)
    {
        $tableName = 'users';

        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'username' => 'required|unique:' . $tableName . ',username',
            'password' => 'required|min:8'
        ]);

        User::create($validated);

        Log::notice('Employer has created a new account');
        return redirect('/')->with('success', 'Account successfully created.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        Log::notice('Employer logged out');
        return redirect('/');
    }
}
