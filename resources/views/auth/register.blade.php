<x-layouts.app>
  <div class="max-w-4xl w-full bg-white shadow-lg rounded-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

    <!-- Left: branding -->
    <div class="hidden md:flex flex-col items-center justify-center p-8 bg-gradient-to-tr from-indigo-600 to-cyan-500 text-white">
      <div class="mb-6">
        <svg class="w-20 h-20" viewBox="0 0 24 24" fill="none">
          <rect x="2" y="2" width="20" height="20" rx="4" stroke="currentColor" stroke-width="1.5"/>
          <path d="M7 12h10M7 8h10M7 16h6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
      </div>
      <h2 class="text-2xl font-semibold">Create Your Account</h2>
      <p class="mt-3 text-sm max-w-xs text-indigo-100">
        Register to access your payslip portal and manage your payroll data.
      </p>
    </div>

    <!-- Right: Register Form -->
    <div class="p-8">
      <div class="mb-6">
        <h1 class="text-2xl font-bold">Create an account</h1>
        <p class="text-sm text-slate-500 mt-1">Fill in your details below.</p>
      </div>

      <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <x-input name="name" type="text" label="Full Name" :value="old('name')" required autofocus />
        <x-input name="email" type="email" label="Email" :value="old('email')" required />
        <x-input name="password" type="password" label="Password" required />
        <x-input name="password_confirmation" type="password" label="Confirm Password" required />

        <div>
          <button type="submit"
            class="w-full py-2 rounded-lg bg-indigo-600 text-white font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-300">
            Create account
          </button>
        </div>
      </form>

      <div class="mt-6 text-center text-sm text-slate-500">
        Already have an account?
        <a href="{{ route('loginForm') }}" class="text-indigo-600 hover:underline">Sign in</a>
      </div>
    </div>
  </div>
</x-layouts.app>
