<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <span class="eyebrow">Safety dashboard</span>
                <h1 class="mt-4 text-3xl font-bold sm:text-4xl">Welcome back, {{ Auth::user()->name }}.</h1>
                <p class="mt-3 max-w-2xl text-base leading-7 text-[var(--muted)]">
                    Track your submitted reports, understand progress at a glance, and keep campus safety concerns visible.
                </p>
            </div>

            <a href="{{ route('complaint.create') }}" class="btn-primary">
                Submit a new report
            </a>
        </div>
    </x-slot>

    <div class="shell mt-8 space-y-8">
        <section data-reveal class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <div class="metric-card">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--muted)]">Total reports</p>
                <p class="mt-4 text-4xl font-bold">{{ $stats['total'] }}</p>
                <p class="mt-3 text-sm text-[var(--muted)]">All complaints you've raised so far.</p>
            </div>
            <div class="metric-card">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--muted)]">Pending</p>
                <p class="mt-4 text-4xl font-bold text-[#b42318]">{{ $stats['pending'] }}</p>
                <p class="mt-3 text-sm text-[var(--muted)]">Waiting for review or action.</p>
            </div>
            <div class="metric-card">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--muted)]">Reviewed</p>
                <p class="mt-4 text-4xl font-bold text-[var(--brand-deep)]">{{ $stats['reviewed'] }}</p>
                <p class="mt-3 text-sm text-[var(--muted)]">Acknowledged and being monitored.</p>
            </div>
            <div class="metric-card">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--muted)]">Resolved</p>
                <p class="mt-4 text-4xl font-bold text-[var(--success)]">{{ $stats['resolved'] }}</p>
                <p class="mt-3 text-sm text-[var(--muted)]">Marked as addressed or closed.</p>
            </div>
        </section>

        <section data-reveal class="grid gap-6 lg:grid-cols-[1.05fr_0.95fr]">
            <div class="soft-panel p-6 sm:p-8">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <span class="eyebrow">Recent activity</span>
                        <h2 class="mt-4 text-2xl font-bold">Latest complaints</h2>
                    </div>
                    <a href="{{ route('complaint.create') }}" class="btn-secondary-dark">New complaint</a>
                </div>

                <div class="mt-6 space-y-4">
                    @forelse ($complaints as $complaint)
                        <article class="rounded-[1.5rem] border border-[var(--line)] bg-white/80 p-5">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                <div class="min-w-0">
                                    <h3 class="text-lg font-bold">{{ $complaint->title }}</h3>
                                    <p class="mt-2 text-sm leading-6 text-[var(--muted)]">{{ $complaint->description }}</p>
                                    <div class="mt-4 flex flex-wrap gap-3 text-sm text-[var(--muted)]">
                                        <span class="rounded-full bg-[var(--surface-strong)] px-3 py-1">{{ $complaint->location }}</span>
                                        <span>{{ $complaint->created_at->format('d M Y, h:i A') }}</span>
                                    </div>
                                </div>

                                @php
                                    $statusClasses = match ($complaint->status) {
                                        'Resolved' => 'bg-emerald-100 text-emerald-800',
                                        'Reviewed' => 'bg-amber-100 text-amber-800',
                                        default => 'bg-rose-100 text-rose-700',
                                    };
                                @endphp
                                <span class="status-chip {{ $statusClasses }}">
                                    {{ $complaint->status }}
                                </span>
                            </div>
                        </article>
                    @empty
                        <div class="rounded-[1.75rem] border border-dashed border-[var(--line)] bg-white/60 p-8 text-center">
                            <h3 class="text-xl font-bold">No reports submitted yet</h3>
                            <p class="mt-3 text-sm leading-6 text-[var(--muted)]">
                                When you submit your first complaint, it will appear here with its location and status.
                            </p>
                            <a href="{{ route('complaint.create') }}" class="btn-primary mt-6">
                                Create first report
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="space-y-6">
                <div class="soft-panel p-6 sm:p-8">
                    <span class="eyebrow">Quick actions</span>
                    <h2 class="mt-4 text-2xl font-bold">Use the platform faster</h2>
                    <div class="mt-5 grid gap-4">
                        <a href="{{ route('complaint.create') }}" class="mini-stat block transition hover:-translate-y-1">
                            <p class="text-sm font-bold uppercase tracking-[0.2em] text-[var(--brand-deep)]">Action 1</p>
                            <p class="mt-2 text-lg font-bold">File a new incident report</p>
                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Add a fresh complaint with title, location, and detailed description.</p>
                        </a>
                        <div class="mini-stat">
                            <p class="text-sm font-bold uppercase tracking-[0.2em] text-[var(--brand-deep)]">Action 2</p>
                            <p class="mt-2 text-lg font-bold">Review your latest pattern</p>
                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Compare your pending, reviewed, and resolved counts at a glance.</p>
                        </div>
                    </div>
                </div>

                <div class="soft-panel p-6 sm:p-8">
                    <span class="eyebrow">Response guide</span>
                    <h2 class="mt-4 text-2xl font-bold">How this tool supports safer campuses</h2>
                    <div class="mt-5 space-y-4 text-sm leading-7 text-[var(--muted)]">
                        <p>Use structured reporting to document unsafe incidents clearly enough for action.</p>
                        <p>Keep repeated locations visible so community leaders can identify hotspots faster.</p>
                        <p>Build student confidence with a calmer interface that feels supportive, not bureaucratic.</p>
                    </div>
                </div>

                <div class="hero-mesh rounded-[2rem] p-6 text-white sm:p-8">
                    <span class="eyebrow border-white/20 bg-white/10 text-white">Community tip</span>
                    <h2 class="mt-4 text-2xl font-bold">Encourage precise details.</h2>
                    <p class="mt-3 text-sm leading-7 text-white/80">
                        Clear locations, timeframes, and short descriptions help authorities recognize patterns and respond meaningfully.
                    </p>
                </div>
            </div>
        </section>

        <section data-reveal class="grid gap-6 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="hero-mesh rounded-[2rem] p-6 text-white sm:p-8">
                <span class="eyebrow border-white/20 bg-white/10 text-white">Monitoring features</span>
                <h2 class="mt-4 text-3xl font-bold">A dashboard that feels active, not empty.</h2>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-[1.5rem] bg-white/10 p-4">
                        <p class="text-sm text-white/72">Recent reports</p>
                        <p class="mt-2 text-lg font-bold">Complaint history feed</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-white/10 p-4">
                        <p class="text-sm text-white/72">Status clarity</p>
                        <p class="mt-2 text-lg font-bold">Pending, reviewed, resolved tags</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-white/10 p-4">
                        <p class="text-sm text-white/72">Location visibility</p>
                        <p class="mt-2 text-lg font-bold">Campus zones attached to each report</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-white/10 p-4">
                        <p class="text-sm text-white/72">Student confidence</p>
                        <p class="mt-2 text-lg font-bold">Simple, supportive flow end to end</p>
                    </div>
                </div>
            </div>

            <div class="soft-panel p-6 sm:p-8">
                <span class="eyebrow">Campus watch board</span>
                <h2 class="mt-4 text-2xl font-bold">Suggested safety focus areas</h2>
                <div class="mt-6 space-y-4">
                    <div class="mini-stat">
                        <div class="flex items-center gap-3">
                            <span class="feature-dot"></span>
                            <p class="text-lg font-bold">High-traffic evening routes</p>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-[var(--muted)]">Use complaint locations to identify stretches of campus that may need stronger lighting or supervision.</p>
                    </div>
                    <div class="mini-stat">
                        <div class="flex items-center gap-3">
                            <span class="feature-dot"></span>
                            <p class="text-lg font-bold">Repeat concern clusters</p>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-[var(--muted)]">Multiple reports from similar areas can indicate where awareness drives or staff presence should increase.</p>
                    </div>
                    <div class="mini-stat">
                        <div class="flex items-center gap-3">
                            <span class="feature-dot"></span>
                            <p class="text-lg font-bold">Response transparency</p>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-[var(--muted)]">Status labels help reassure users that reports are part of a monitored process rather than a dead end.</p>
                    </div>
                </div>
            </div>
        </section>

        <section data-reveal class="grid gap-6 lg:grid-cols-[1fr_1fr]">
            <div class="soft-panel p-6 sm:p-8">
                <span class="eyebrow">Prepared reporting</span>
                <h2 class="mt-4 text-2xl font-bold">A quick checklist before filing</h2>
                <div class="mt-6 space-y-4">
                    <div class="checklist-item">
                        <span class="feature-dot mt-1"></span>
                        <div>
                            <p class="font-bold">Pinpoint the place</p>
                            <p class="mt-1 text-sm leading-6 text-[var(--muted)]">Specific routes, buildings, and gates help make patterns easier to interpret later.</p>
                        </div>
                    </div>
                    <div class="checklist-item">
                        <span class="feature-dot mt-1"></span>
                        <div>
                            <p class="font-bold">Use factual detail</p>
                            <p class="mt-1 text-sm leading-6 text-[var(--muted)]">Short, clear descriptions tend to support faster review and better follow-up context.</p>
                        </div>
                    </div>
                    <div class="checklist-item">
                        <span class="feature-dot mt-1"></span>
                        <div>
                            <p class="font-bold">Track repeat discomfort zones</p>
                            <p class="mt-1 text-sm leading-6 text-[var(--muted)]">Even smaller incidents matter when they point to a recurring unsafe environment.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-mesh rounded-[2rem] p-6 text-white sm:p-8">
                <span class="eyebrow border-white/20 bg-white/10 text-white">Platform value</span>
                <h2 class="mt-4 text-3xl font-bold">Designed for clarity at every step.</h2>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="insight-card">
                        <p class="text-sm text-white/72">Reporting</p>
                        <p class="mt-2 text-lg font-bold">A calmer, less intimidating flow</p>
                    </div>
                    <div class="insight-card">
                        <p class="text-sm text-white/72">Tracking</p>
                        <p class="mt-2 text-lg font-bold">Recent complaint feed with visible status</p>
                    </div>
                    <div class="insight-card">
                        <p class="text-sm text-white/72">Monitoring</p>
                        <p class="mt-2 text-lg font-bold">Location-aware insight for campus teams</p>
                    </div>
                    <div class="insight-card">
                        <p class="text-sm text-white/72">Trust</p>
                        <p class="mt-2 text-lg font-bold">A stronger sense that reports are not disappearing</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
