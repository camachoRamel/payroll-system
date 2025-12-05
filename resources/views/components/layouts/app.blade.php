<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link rel="stylesheet" href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <header class="w-full bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <i class="hgi hgi-stroke hgi-user text-blue-500 text-4xl "></i>
                <div>
                    <p class="font-semibold text-lg">Payroll Admin</p>
                    <p class="text-sm text-slate-500">Welcome, {{ Auth::user()->first_name}}!</p>
                </div>
            </div>

            <form method="POST" action="/logout">
                @csrf
                <button class="px-4 py-2 shadow-md rounded-lg text-slate-600 hover:bg-slate-100">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8">
    {{-- Tabs --}}
    @if (Auth::user()->role == 1)
    <div class="flex gap-2 mb-4 w-auto">
    <div class="bg-gray-200 rounded-lg py-1 flex">
        <a href="{{ route('employer.dashboard') }}"
           class="tab-link px-4 py-2 rounded-lg {{ request()->routeIs('employer.dashboard') ? 'bg-white shadow-sm text-slate-700' : 'text-slate-500 hover:text-slate-700' }} "
           >
           Overview
        </a>

        <a href="{{ route('employer.employees') }}"
           class="tab-link px-4 py-2 rounded-lg {{ request()->routeIs('employer.employees') || request()->routeIs('employer.addEmployeeForm') ? 'bg-white shadow-sm text-slate-700' : 'text-slate-500 hover:text-slate-700' }} "
           >
           Employees
        </a>

        <a href="{{ route('employer.payroll') }}"
           class="tab-link px-4 py-2 rounded-lg {{ request()->routeIs('employer.payroll') || request()->routeIs('employer.addPayrollForm') ? 'bg-white shadow-sm text-slate-700' : 'text-slate-500 hover:text-slate-700' }}"
           >
           Payroll
        </a>
    </div>
</div>
    @endif

        {{ $slot }}
    </main>

</body>
</html>
