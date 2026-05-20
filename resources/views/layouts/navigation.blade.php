<nav x-data="{ open: false }" class="shell pt-4 sm:pt-6">
    <div class="glass-panel px-4 py-3 sm:px-6">
        <div class="flex items-center justify-between gap-4">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <x-application-logo class="h-11 w-11 shrink-0" />
                <div>
                    <p class="font-['Space_Grotesk'] text-lg font-bold text-[var(--text)]">CampusSaathi</p>
                    <p class="text-xs uppercase tracking-[0.24em] text-[var(--muted)]">Women's safety network</p>
                </div>
            </a>

            <div class="hidden items-center gap-3 md:flex">
                <a href="{{ route('dashboard') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-[var(--brand-deep)] text-white' : 'text-[var(--muted)] hover:bg-white/70' }}">
                    Dashboard
                </a>
                <a href="{{ route('complaint.create') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition {{ request()->routeIs('complaint.create') ? 'bg-[var(--brand-deep)] text-white' : 'text-[var(--muted)] hover:bg-white/70' }}">
                    Report Incident
                </a>
                <a href="{{ route('profile.edit') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold text-[var(--muted)] transition hover:bg-white/70">
                    Profile
                </a>
            </div>

            <div class="hidden items-center gap-3 md:flex">
                <div class="rounded-full border border-[var(--line)] bg-white/70 px-4 py-2 text-right">
                    <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-[var(--muted)]">{{ Auth::user()->email }}</p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-secondary-dark px-4 py-2 text-sm">
                        Log out
                    </button>
                </form>
            </div>

            <button @click="open = !open"
                    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[var(--line)] bg-white/70 md:hidden"
                    type="button"
                    aria-label="Toggle navigation">
                <svg class="h-5 w-5 text-[var(--text)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M4 12h16M4 17h16" />
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>
        </div>

        <div x-show="open" x-transition class="mt-4 space-y-3 border-t border-[var(--line)] pt-4 md:hidden">
            <a href="{{ route('dashboard') }}" class="block rounded-2xl bg-white/70 px-4 py-3 text-sm font-semibold text-[var(--text)]">
                Dashboard
            </a>
            <a href="{{ route('complaint.create') }}" class="block rounded-2xl bg-white/70 px-4 py-3 text-sm font-semibold text-[var(--text)]">
                Report Incident
            </a>
            <a href="{{ route('profile.edit') }}" class="block rounded-2xl bg-white/70 px-4 py-3 text-sm font-semibold text-[var(--text)]">
                Profile
            </a>

            <div class="rounded-2xl border border-[var(--line)] bg-white/70 px-4 py-3">
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-sm text-[var(--muted)]">{{ Auth::user()->email }}</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-primary w-full">
                    Log out
                </button>
            </form>
        </div>
    </div>
</nav>
