<x-guest-layout>
    <div>
        <span class="eyebrow">Create account</span>
        <h2 class="mt-4 text-3xl font-bold">Join the campus safety network</h2>
        <p class="mt-3 text-sm leading-6 text-[var(--muted)]">
            Register to submit reports, track complaint status, and contribute to a more responsive university environment.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
        @csrf

        <div>
            <label for="name" class="field-label">Full name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="field-input">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="field-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="field-input">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="field-label">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="field-input">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="field-label">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="field-input">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a class="text-sm text-[var(--muted)] hover:text-[var(--brand-deep)]" href="{{ route('login') }}">
                Already registered? Sign in
            </a>

            <button type="submit" class="btn-primary">
                Register
            </button>
        </div>
    </form>
</x-guest-layout>
