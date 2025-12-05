<x-layouts.app title="Employee Management">

    @if(session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif

    <div class="px-2 pt-1">
        <div class="flex justify-between">

        {{-- Title --}}
        <div class="block">

        <h1 class="text-xl md:text-2xl font-semibold text-slate-800">Payroll Management</h1>
        <p class="text-slate-500">Manage employee payroll</p>

        </div>
        {{-- Add Employee Button --}}
        <div>
            <a href="{{ route('employer.addPayrollForm') }}"
            class="flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-green-700 transition">
                <i class="hgi hgi-stroke hgi-plus-sign font-bold"></i>
                </svg>
                Add Payroll
            </a>
        </div>
        </div>

        {{-- Employee Card --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-6">
            @if ($payroll_records->count() == 0)
                <h2>No payroll record to display</h2>
            @endif
            @foreach ($payroll_records as $rec)
                <x-payroll-card
                    id="{{ $rec->id }}"
                    name="{{ $rec->first_name }} {{ $rec->middle_name }} {{ $rec->last_name }}"
                    period="{{ $rec->period }}"
                    status="{{ $rec->status }}"
                    base-salary="{{ $rec->base_salary }}"
                    allowances="{{ $rec->allowance }}"
                    deductions="{{ $rec->deductions }}"
                    net-salary="{{ $rec->net_salary }}"
                />
            @endforeach
        </div>




    </div>
</x-layouts.app>
