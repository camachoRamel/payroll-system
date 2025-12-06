@props([
    'id',
    'name',
    'email',
    'position',
    'hired',
    'salary',
    'status' => 'active',
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

    {{-- Email --}}
    <div class="flex items-center gap-2 mt-4 text-slate-700">
        <i class="hgi hgi-stroke hgi-mail-01 text-slate-500"></i>
        {{ $email }}
    </div>

    {{-- Role + Company --}}
    <div class="flex items-center gap-2 mt-2 text-slate-700">
        <i class="hgi hgi-stroke hgi-manager text-slate-500"></i>
        {{ $position }}
    </div>

    {{-- Hire date --}}
    <p class="text-slate-500 text-sm mt-2">
        Hired: {{ \Carbon\Carbon::parse($hired)->format('Y-m-d') }}
    </p>

    {{-- Salary --}}
    <p class="text-green-600 font-semibold text-lg mt-3">
        ${{ number_format($salary, 2) }} /month
    </p>

    {{-- Action Buttons --}}
    <div class="flex items-center gap-3 absolute right-6 top-6">

        {{-- Edit --}}
        <a href="{{ route('employer.editEmployeeForm', $id) }}" class="bg-white border border-slate-200 rounded-lg px-2 py-1 hover:bg-slate-50 transition">
            <i class="hgi hgi-stroke hgi-pencil-edit-02 text-slate-600 font-bold"></i>
        </a>

        {{-- Delete --}}
        <form action="{{ route('employer.deleteEmployee', $id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white rounded-lg px-2 py-1 hover:bg-red-600 transition">
                <i class="hgi hgi-stroke hgi-delete-02 text-white font-bold"></i>
            </button>
        </form>
    </div>

</div>
