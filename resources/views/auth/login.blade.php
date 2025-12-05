<x-layouts.default>

    <div class="max-w-4xl w-full bg-white shadow-lg rounded-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
    <div class="hidden md:flex flex-col items-center justify-center p-8 bg-gradient-to-tr from-indigo-600 to-cyan-500 text-white">
      <h2 class="text-2xl font-semibold">Payslip Portal</h2>
      <p class="mt-3 text-sm max-w-xs text-indigo-100">
        Securely view payslips, manage payroll preferences, and access employee documents.
      </p>
    </div>

    <div class="p-8">
      <div class="mb-6">
        <h1 class="text-2xl font-bold">Sign in to your account</h1>
        <p class="text-sm text-slate-500 mt-1">Enter your username and password to access payslips.</p>
      </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            @if(session('error'))
                <x-alert type="error" :message="session('error')" />
            @endif
            @if(session('success'))
                <x-alert type="success" :message="session('success')" />
            @endif

            <x-input name="username" type="text" label="Username" :value="old('username')" required autofocus />
            <x-input name="password" type="password" label="Password" required />

            <div>
                <button type="submit"
                class="w-full py-2 rounded-lg bg-indigo-600 text-white font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                Sign in
                </button>
            </div>
        </form>

      <div class="mt-6 text-center text-sm text-slate-500">
        Don’t have an account?
        <a href="{{ route('registerForm') }}" class="text-indigo-600 hover:underline">Create account</a>
      </div>
    </div>
  </div>
</x-layouts.default>
