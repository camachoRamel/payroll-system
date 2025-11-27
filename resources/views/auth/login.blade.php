<x-layouts.app>
  <div class="max-w-4xl w-full bg-white shadow-lg rounded-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
    <!-- Left: branding / illustration -->
    <div class="hidden md:flex flex-col items-center justify-center p-8 bg-gradient-to-tr from-indigo-600 to-cyan-500 text-white">
      <div class="mb-6">
        <!-- placeholder logo: replace with your SVG/logo -->
        <svg class="w-20 h-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="2" y="2" width="20" height="20" rx="4" stroke="currentColor" stroke-width="1.5"/>
          <path d="M7 12h10M7 8h10M7 16h6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
      </div>
      <h2 class="text-2xl font-semibold">Payslip Portal</h2>
      <p class="mt-3 text-sm max-w-xs text-indigo-100">
        Securely view payslips, manage payroll preferences, and access employee documents.
      </p>
    </div>

    <!-- Right: login form -->
    <div class="p-8">
      <div class="mb-6">
        <h1 class="text-2xl font-bold">Sign in to your account</h1>
        <p class="text-sm text-slate-500 mt-1">Enter your username and password to access payslips.</p>
      </div>

      @if(session('status'))
        <div class="mb-4 p-3 bg-emerald-50 text-emerald-700 rounded">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <x-input name="username" type="text" label="Username" :value="old('username')" required autofocus />
        <x-input name="password" type="password" label="Password" required />

        <div class="flex items-center justify-between text-sm">
          <label class="inline-flex items-center">
            <input type="checkbox" name="remember" class="mr-2 h-4 w-4 rounded border-slate-300" {{ old('remember') ? 'checked' : '' }}>
            Remember me
          </label>

          {{-- <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">Forgot password?</a> --}}
        </div>

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
</x-layouts.app>
