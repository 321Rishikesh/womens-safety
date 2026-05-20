<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div>
        <span class="eyebrow">Welcome back</span>
        <h2 class="mt-4 text-3xl font-bold">Sign in to your safety workspace</h2>
        <p class="mt-3 text-sm leading-6 text-[var(--muted)]">
            Access your reports, monitor complaint progress, and continue supporting a safer campus environment.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
        @csrf

        <div>
            <label for="email" class="field-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="field-input">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="field-label">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="field-input">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <label for="remember_me" class="inline-flex items-center gap-3 text-sm text-[var(--muted)]">
                <input id="remember_me" type="checkbox" class="rounded border-[var(--line)] text-[var(--brand)] focus:ring-[var(--brand)]" name="remember">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-[var(--brand-deep)] hover:underline" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a class="text-sm text-[var(--muted)] hover:text-[var(--brand-deep)]" href="{{ route('register') }}">
                Need an account? Register
            </a>

            <button type="submit" class="btn-primary">
                Log in
            </button>
        </div>
    </form>
</x-guest-layout>
