<x-layouts.app title="Edit Employee">

    <div class="px-4 md:px-8 pt-6">

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 md:p-10">

            <h2 class="text-xl font-semibold text-slate-700">Edit Employee</h2>
            <p class="text-slate-500 mb-8">Update employee information</p>

            <form action="{{ route('employer.updateEmployee', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- First Name --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">First Name *</label>
                        <input type="text" name="first_name"
                               value="{{ $employee->first_name }}"
                               class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:ring-indigo-200 focus:outline-none"
                               required>
                    </div>

                    {{-- Middle Name --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Middle Name</label>
                        <input type="text" name="middle_name"
                               value="{{ $employee->middle_name }}"
                               class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:ring-indigo-200 focus:outline-none">
                    </div>

                    {{-- Last Name --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Last Name *</label>
                        <input type="text" name="last_name"
                               value="{{ $employee->last_name }}"
                               class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:ring-indigo-200 focus:outline-none"
                               required>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">

                    {{-- Email --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Email *</label>
                        <input type="email" name="email"
                               value="{{ $employee->email }}"
                               class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:ring-indigo-200 focus:outline-none"
                               required>
                    </div>

                    {{-- Position --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Position *</label>
                        <input type="text" name="position"
                               value="{{ $employee->position }}"
                               class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:ring-indigo-200 focus:outline-none"
                               required>
                    </div>

                    {{-- Hire Date --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Hire Date *</label>
                        <input type="date" name="hired_at"
                               value="{{ \Carbon\Carbon::parse($employee->hired_at)->format('Y-m-d') }}"
                               class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:ring-indigo-200 focus:outline-none"
                               required>
                    </div>

                    {{-- Base Salary --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Base Salary *</label>
                        <input type="number" name="base_salary"
                               value="{{ $employee->base_salary }}"
                               class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:ring-indigo-200 focus:outline-none"
                               required>
                    </div>

                    {{-- Status --}}
                    <div class="md:col-span-2">
                        <label class="text-sm font-medium text-slate-700">Status</label>
                        <select name="status"
                                class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:ring-indigo-200 focus:outline-none">
                            <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div>

                <div class="mt-10 flex gap-3">
                    <button type="submit"
                            class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg shadow hover:bg-indigo-700 transition">
                        Update Employee
                    </button>

                    <a href="{{ route('employer.employees') }}"
                       class="px-6 py-2.5 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-100 transition">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

</x-layouts.app>
