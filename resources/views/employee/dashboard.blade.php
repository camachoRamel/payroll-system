<x-layouts.app>

    {{-- Dashboard Cards Section --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        {{-- Card 1: Total Earnings --}}
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-slate-500">Total Earnings</p>
                {{-- Replace hardcoded value with a Blade variable, e.g., $totalEarnings --}}
                <p class="text-3xl font-bold text-slate-900 mt-1">$ {{ number_format($payroll_records->sum('net_salary'), 2) }}</p>
                <p class="text-xs text-slate-400 mt-1">All time</p>
            </div>
        </div>

        {{-- Card 2: Latest Payment --}}
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-slate-500">Latest Payment</p>
                {{-- Replace hardcoded value with a Blade variable, e.g., $latestPaymentAmount --}}
                <p class="text-3xl font-bold text-slate-900 mt-1">$ {{ number_format($payroll_records[0]->net_salary, 2) }} </p>
                {{-- Replace hardcoded value with a Blade variable, e.g., $latestPaymentPeriod --}}
                <p class="text-xs text-slate-400 mt-1"> {{ $payroll_records[0]->period }} </p>
            </div>
            <i class="hgi hgi-stroke hgi-calendar text-blue-400 text-xl"></i>
        </div>

        {{-- Card 3: Base Salary --}}
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-slate-500">Base Salary</p>
                {{-- Replace hardcoded value with a Blade variable, e.g., $baseSalary --}}
                <p class="text-3xl font-bold text-slate-900 mt-1">$ {{ number_format($employee->base_salary, 2) }} </p>
                <p class="text-xs text-slate-400 mt-1">Per month</p>
            </div>
            <i class="hgi hgi-stroke hgi-chart-line text-indigo-400 text-xl"></i>
        </div>
    </div>

    {{-- Payroll History Section --}}
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-xl font-semibold text-slate-700">Payroll History</h2>
        <p class="text-sm text-slate-500 mb-4">Your payment records</p>

        {{-- Table Container with Horizontal Scroll --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                            Period
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                            Base Salary
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                            Allowances
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                            Deductions
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                            Net Salary
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($payroll_records as $rec)

                    {{-- Record 1 --}}
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900"> {{ $rec->period }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">$ {{ number_format($employee->base_salary, 2) }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">+$ {{ number_format($rec->allowance, 2) }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-medium">-$ {{ number_format($rec->deductions, 2) }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-slate-900">$ {{ number_format($rec->net_salary, 2) }} </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $rec->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    {{-- Loop through payroll records here, e.g., @foreach ($payrolls as $payroll) --}}
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
