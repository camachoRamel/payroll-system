@props([
    'id',
    'name',
    'period',
    'status',

    'baseSalary',
    'allowances',
    'deductions',
    'netSalary',
])

<div class="relative bg-white rounded-xl shadow-md p-6">

    {{-- Name + Status --}}
    <div class="flex items-center gap-3">
        <p class="text-lg font-semibold text-slate-800">{{ $name }}</p>

        <span class="text-xs
            {{ $status === 'active' ? 'bg-green-100 text-green-700' : 'bg-slate-200 text-slate-600' }}
            px-2 py-1 rounded-full capitalize">
            {{ $status }}
        </span>
    </div>

    <!-- Period -->
    <div class="flex items-center gap-2 text-gray-700 mt-4">
        <i class="hgi hgi-stroke hgi-calendar-03 font-bold"></i>
        <span class="text-sm">Period: {{ $period }}</span>
    </div>

    <!-- Salary Rows -->
    <div class="grid grid-cols-2 text-sm">
        <div>
            <p class="text-gray-500">Base Salary</p>
            <p class="font-semibold">${{ number_format($baseSalary, 2) }}</p>
        </div>

        <div>
            <p class="text-gray-500">Allowances</p>
            <p class="font-semibold text-green-600">
                +${{ number_format($allowances, 2) }}
            </p>
        </div>

        <div class="mt-4">
            <p class="text-gray-500">Deductions</p>
            <p class="font-semibold text-red-600">
                -${{ number_format($deductions, 2) }}
            </p>
        </div>

        <div class="mt-4">
            <p class="text-gray-500">Net Salary</p>
            <p class="font-semibold text-green-600">
                ${{ number_format($netSalary, 2) }}
            </p>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex items-center gap-3 absolute right-6 top-6">

        {{-- Edit --}}
        <button class="bg-white border border-slate-200 rounded-lg px-2 py-1 hover:bg-slate-50 transition">
            <i class="hgi hgi-stroke hgi-pencil-edit-02 text-slate-600 font-bold"></i>
        </button>

        {{-- Delete --}}
        <form action="{{ route('employer.deletePayroll', $id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white rounded-lg px-2 py-1 hover:bg-red-600 transition">
                <i class="hgi hgi-stroke hgi-delete-02 text-white font-bold"></i>
            </button>
        </form>

    </div>

</div>
