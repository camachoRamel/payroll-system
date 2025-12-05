<x-layouts.app title="Employee Management">

    @if(session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif

    <div class="px-2 pt-1">
        <div class="flex justify-between">

        {{-- Title --}}
        <div class="block">

        <h1 class="text-xl md:text-2xl font-semibold text-slate-800">Employee Management</h1>
        <p class="text-slate-500">Manage your workforce</p>

        </div>
        {{-- Add Employee Button --}}
        <div>
            <a href="{{ route('employer.addEmployeeForm') }}"
            class="flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-indigo-700 transition">
                <i class="hgi hgi-stroke hgi-plus-sign font-bold"></i>
                Add Employee
            </a>
        </div>
        </div>

        {{-- Employee Card --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-6">
            @foreach ($employees as $emp)
            <x-employee-card
                id="{{ $emp->id }}"
                name="{{ $emp->first_name }} {{ $emp->middle_name }} {{ $emp->last_name }}"
                email="{{ $emp->email }}"
                position="{{ $emp->position }}"
                hired="{{ $emp->hired_at }}"
                salary="{{ $emp->base_salary }}"
                status="{{ $emp->status }}"
            />
            @endforeach
    </div>
</x-layouts.app>
