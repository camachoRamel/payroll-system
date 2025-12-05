<x-layouts.app>

    {{-- Metric Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        {{-- Total Employees --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="text-slate-700 font-semibold">Total Employees</p>
            <div class="text-3xl font-bold mt-1">{{ $employees->count() }}</div>
            <p class="text-sm text-slate-500">{{ $employees->where('status', 'active')->count() }} active</p>
        </div>

        {{-- Total Payroll --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="text-slate-700 font-semibold">Total Payroll</p>
            <div class="text-3xl font-bold mt-1">${{ $payroll_records->sum('net_salary') }}</div>
            <p class="text-sm text-slate-500">{{ $payroll_records->count() }} records</p>
        </div>

        {{-- Avg Salary --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="text-slate-700 font-semibold">Avg Salary</p>
            <div class="text-3xl font-bold mt-1">${{ $employees->average('base_salary') }}</div>
            <p class="text-sm text-slate-500">per employee</p>
        </div>
    </div>

    {{-- Two-Column Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Recent Employees --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="font-semibold text-slate-800">Recent Employees</p>
            <p class="text-sm text-slate-500 mb-4">Latest additions to the team</p>

            <div class="flex flex-col">
                @foreach ($employees as $emp)

                <div class="flex justify-between items-center bg-slate-50 p-4 rounded-lg">
                    <div>
                        <p class="font-semibold">{{ $emp->first_name }} {{ $emp->middle_name }} {{ $emp->last_name }} </p>
                        <p class="text-sm text-slate-500"> {{ $emp->position }} </p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-green-500 text-sm">$ {{ $emp->base_salary }} </p>
                    </div>
                </div>

                @endforeach
            </div>
        </div>

        {{-- Recent Payroll --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="font-semibold text-slate-800">Recent Payroll</p>
            <p class="text-sm text-slate-500 mb-4">Latest payroll records</p>

            <div class="space-y-3">
                @foreach ($payroll_records as $rec)
                <div class="flex justify-between items-center bg-slate-50 p-4 rounded-lg">
                    <div>
                        <p class="font-semibold">{{ $rec->first_name }} {{ $rec->middle_name }} {{$rec->last_name}} </p>
                        <p class="text-sm text-slate-500"> {{ $rec->period }} </p>
                    </div>
                    <div class="text-right text-green-600 font-semibold">
                        $ {{ $rec->net_salary }} <span class="text-green-500 text-sm"> {{ $rec->status }} </span>
                    </div>
                </div>

                @endforeach
            </div>
        </div>

    </div>

</x-layouts.app>
