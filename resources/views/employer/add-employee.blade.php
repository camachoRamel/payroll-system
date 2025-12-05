<x-layouts.app title="Employee Management">
    <div class="px-4 md:px-8 pt-4">

        {{-- Create Employee Form --}}
        <div class="mt-6 bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">

            <h2 class="text-lg font-semibold text-slate-700 mb-1">Add New Employee</h2>
            <p class="text-slate-500 mb-6">Enter employee details</p>

            <form method="POST" action="{{ route('employer.addEmployee') }}">
                @if(session('error'))
                    <x-alert type="error" :message="session('error')" />
                @endif
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- First Name --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">First Name <span class="text-red-500 text-lg">*</span></label>
                        <input name="first_name" type="text"
                               class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2
                                      focus:outline-none focus:ring focus:ring-indigo-200" required>
                    </div>

                    {{-- Middle Name --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Middle Name</label>
                        <input name="middle_name" type="text"
                               class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2
                                      focus:outline-none focus:ring focus:ring-indigo-200">
                    </div>

                    {{-- Last Name --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Last Name <span class="text-red-500 text-lg">*</span></label>
                        <input name="last_name" type="text"
                               class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2
                                      focus:outline-none focus:ring focus:ring-indigo-200" required>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                    {{-- Email --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Email <span class="text-red-500 text-lg">*</span></label>
                        <input name="email" type="email"
                               class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2
                                      focus:outline-none focus:ring focus:ring-indigo-200" required>
                    </div>

                    {{-- Position --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Position <span class="text-red-500 text-lg">*</span></label>
                        <input name="position" type="text"
                               class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2
                                      focus:outline-none focus:ring focus:ring-indigo-200" required>
                    </div>

                    {{-- Base Salary --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Base Salary <span class="text-red-500 text-lg">*</span></label>
                        <input name="base_salary" type="number"
                               class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2
                                      focus:outline-none focus:ring focus:ring-indigo-200"
                               placeholder="500.00" required>
                    </div>

                    {{-- Hire Date --}}
                    <div>
                        <label class="text-sm font-medium text-slate-700">Hire Date <span class="text-red-500 text-lg">*</span></label>
                        <input name="hired_at" type="date"
                               class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2
                                      focus:outline-none focus:ring focus:ring-indigo-200" required>
                    </div>

                </div>

                {{-- Buttons --}}
                <div class="mt-8 flex gap-3">
                    <button type="submit"
                            class="bg-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
                        Create Employee
                    </button>

                    <a href="{{ route('employer.employees') }}"
                       class="px-5 py-2 rounded-lg border border-slate-300 text-slate-700
                              hover:bg-slate-100 transition">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-layouts.app>
