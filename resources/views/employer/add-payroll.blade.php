<x-layouts.app title="Payroll Management">

    <div class="px-4 md:px-8 pt-4">

        {{-- Add Payroll Card --}}
        <div class=" bg-white border border-slate-200 rounded-xl shadow-sm p-6 md:p-8">

            <h2 class="text-lg font-semibold text-slate-700 mb-1">Add New Payroll</h2>
            <p class="text-slate-500 mb-6">Create new payroll record</p>

            <form method="POST" action="{{ route('employer.addPayroll') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Employee Selector --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Employee <span class="text-red-500 text-lg">*</span></label>
                        <select name="employee" id="employee" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                            @foreach ($payroll_records as $rec)
                                <option value="{{ $rec->id }}">
                                    {{ $rec->first_name }} {{ $rec->middle_name }} {{ $rec->last_name }}
                                </option>
                            @endforeach
                    </select>

                    </div>

                    {{-- Month --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Month <span class="text-red-500 text-lg">*</span></label>
                        <select name="month" id="month"
                            class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2 focus:ring-indigo-200 focus:outline-none">
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}">{{ $m }}</option>
                            @endfor
                        </select>
                    </div>

                    {{-- Year --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Year <span class="text-red-500 text-lg">*</span></label>
                        <input required name="year" id="year" type="number" value="{{ now()->year }}"
                            class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2 focus:ring-indigo-200 focus:outline-none" required />
                    </div>

                    {{-- Base Salary --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Base Salary </label>
                        <input name="baseSalary" id="baseSalary" type="number" value="{{ $payroll_records[0]->base_salary }}" readonly
                            class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2 bg-slate-100" />
                    </div>

                    {{-- Allowances --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Allowances</label>
                        <input name="allowances" id="allowances" type="number" value="0"
                            class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required />
                    </div>

                    {{-- Deductions --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Deductions</label>
                        <input name="deductions" id="deductions" type="number" value="0"
                            class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required />
                    </div>

                </div>

                {{-- Net Salary --}}
                <div class="mt-6">
                    <label class="text-sm font-medium text-slate-700">Net Salary</label>
                    <div class="flex mt-1 w-full border border-slate-300 rounded-lg px-3 py-2 bg-slate-100">
                        <span class="text-green-600 font-semibold mr-2">$</span>
                    <input name="netSalary" id="netSalary" type="text" readonly
                           class="text-green-600 font-semibold" />

                    </div>
                </div>

                {{-- Buttons --}}
                <div class="mt-8 flex gap-3">
                    <button type="submit"
                            class="bg-green-600 text-white px-5 py-2 rounded-lg shadow hover:bg-green-700 transition">
                        Create Payroll
                    </button>

                    <a href="{{ route('employer.payroll') }}"
                       class="px-5 py-2 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-100 transition">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

<script>
document.addEventListener("DOMContentLoaded", () => {

    const employeeSelect = document.querySelector("#employee");
    const baseSalaryInput = document.querySelector("#baseSalary");
    const allowancesInput = document.querySelector("#allowances");
    const deductionsInput = document.querySelector("#deductions");
    const netSalaryInput = document.querySelector("#netSalary");

    // calculates Net Salary
    function calculateNet() {
        let base = parseFloat(baseSalaryInput.value) || 0;
        let allow = parseFloat(allowancesInput.value) || 0;
        let deduct = parseFloat(deductionsInput.value) || 0;

        let net = base + allow - deduct;
        netSalaryInput.value = net.toLocaleString();
    }
    calculateNet()

    allowancesInput.addEventListener("input", calculateNet);
    deductionsInput.addEventListener("input", calculateNet);

    // update Base Salary when employee changes
    employeeSelect.addEventListener("change", () => {

        const employeeId = employeeSelect.value;

        fetch(`/payroll/get-employee/${employeeId}`)
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                baseSalaryInput.value = data.base_salary;
                calculateNet();
            })
            .catch(err => console.error("Error loading salary:", err));
    });

});
</script>


</x-layouts.app>
