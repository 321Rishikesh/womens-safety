<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'CampusSaathi') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="relative overflow-hidden">
            <header class="shell sticky-shell pt-6">
                <div class="glass-panel px-5 py-4 sm:px-7">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <a href="/" class="flex items-center gap-3">
                            <x-application-logo class="h-12 w-12" />
                            <div>
                                <p class="font-['Space_Grotesk'] text-xl font-bold">CampusSaathi</p>
                                <p class="text-sm text-[var(--muted)]">Women's safety reporting and monitoring</p>
                            </div>
                        </a>

                        <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                            <a href="#overview" class="rounded-full px-4 py-2 text-sm font-semibold text-[var(--muted)] transition hover:bg-white/70">
                                Overview
                            </a>
                            <a href="#features" class="rounded-full px-4 py-2 text-sm font-semibold text-[var(--muted)] transition hover:bg-white/70">
                                Features
                            </a>
                            <a href="#workflow" class="rounded-full px-4 py-2 text-sm font-semibold text-[var(--muted)] transition hover:bg-white/70">
                                Workflow
                            </a>
                            <a href="#faq" class="rounded-full px-4 py-2 text-sm font-semibold text-[var(--muted)] transition hover:bg-white/70">
                                FAQ
                            </a>
                            @auth
                                <a href="{{ route('dashboard') }}" class="btn-secondary-dark">Go to dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn-secondary-dark">Sign in</a>
                                <a href="{{ route('register') }}" class="btn-primary">Create account</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </header>

            <main class="shell pb-16 pt-8 sm:pt-12">
                <section id="overview" data-reveal class="grid items-center gap-8 lg:grid-cols-[1.08fr_0.92fr]">
                    <div class="hero-mesh relative overflow-hidden rounded-[2.25rem] px-6 py-10 text-white shadow-2xl sm:px-10 sm:py-14">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_20%,rgba(255,255,255,0.16),transparent_16rem)]"></div>
                        <div class="absolute right-6 top-6 hidden rounded-[1.5rem] border border-white/15 bg-white/10 px-4 py-3 backdrop-blur md:block">
                            <p class="text-xs uppercase tracking-[0.22em] text-white/70">Campus pulse</p>
                            <p class="mt-2 text-2xl font-bold">Live support</p>
                            <p class="text-sm text-white/75">Reports, trends, and response visibility</p>
                        </div>
                        <div class="relative">
                            <span class="eyebrow border-white/20 bg-white/10 text-white">Community-led safety</span>
                            <h1 class="mt-6 max-w-3xl text-4xl font-bold leading-tight sm:text-5xl lg:text-6xl">
                                A responsive safety platform for reporting campus incidents with dignity and speed.
                            </h1>
                            <p class="mt-6 max-w-2xl text-base leading-7 text-white/82 sm:text-lg">
                                Empower students to report harassment, unsafe zones, or urgent concerns while giving administrators a clear monitoring view to respond faster and build trust.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-4">
                                <a href="#features" class="btn-secondary">
                                    Explore features
                                </a>
                                @auth
                                    <a href="{{ route('complaint.create') }}" class="btn-secondary-dark">
                                        Report an incident
                                    </a>
                                    <a href="{{ route('dashboard') }}" class="btn-primary">
                                        View dashboard
                                    </a>
                                @else
                                    <a href="{{ route('register') }}" class="btn-secondary">
                                        Start reporting safely
                                    </a>
                                    <a href="{{ route('login') }}" class="btn-primary">
                                        Access your account
                                    </a>
                                @endauth
                            </div>

                            <div class="mt-10 grid gap-4 sm:grid-cols-3">
                                <div class="rounded-3xl border border-white/15 bg-white/10 p-4">
                                    <p class="text-2xl font-bold">Anonymous-ready</p>
                                    <p class="mt-2 text-sm text-white/75">Designed around privacy-first reporting patterns.</p>
                                </div>
                                <div class="rounded-3xl border border-white/15 bg-white/10 p-4">
                                    <p class="text-2xl font-bold">Location-aware</p>
                                    <p class="mt-2 text-sm text-white/75">Spot unsafe campus hotspots and repeating concerns.</p>
                                </div>
                                <div class="rounded-3xl border border-white/15 bg-white/10 p-4">
                                    <p class="text-2xl font-bold">Action-focused</p>
                                    <p class="mt-2 text-sm text-white/75">Turn reports into accountable campus responses.</p>
                                </div>
                            </div>

                            <div class="mt-8 grid gap-3 sm:grid-cols-3">
                                <div class="rounded-[1.4rem] bg-black/15 px-4 py-3">
                                    <p class="text-sm text-white/70">Safety campaigns</p>
                                    <p class="mt-1 font-semibold">Awareness posters and outreach cues</p>
                                </div>
                                <div class="rounded-[1.4rem] bg-black/15 px-4 py-3">
                                    <p class="text-sm text-white/70">Hotspot watch</p>
                                    <p class="mt-1 font-semibold">Track repeated unsafe locations</p>
                                </div>
                                <div class="rounded-[1.4rem] bg-black/15 px-4 py-3">
                                    <p class="text-sm text-white/70">Response loop</p>
                                    <p class="mt-1 font-semibold">Make follow-up more visible</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-5">
                        <div class="soft-panel gradient-outline p-6 sm:p-7">
                            <span class="eyebrow">Why it matters</span>
                            <h2 class="mt-4 text-2xl font-bold sm:text-3xl">A safer campus starts with visible support and easier reporting.</h2>
                            <p class="mt-4 text-[15px] leading-7 text-[var(--muted)]">
                                Many students do not report incidents because the process feels intimidating, unclear, or disconnected from real help. CampusSaathi gives communities a calmer, more supportive first step.
                            </p>
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div class="soft-panel p-6">
                                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[var(--brand-deep)]">Students</p>
                                <p class="mt-3 text-xl font-bold">Report issues in minutes</p>
                                <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Clean forms, mobile-first access, and reduced friction when sharing what happened and where.</p>
                            </div>
                            <div class="soft-panel p-6">
                                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[var(--brand-deep)]">Institutions</p>
                                <p class="mt-3 text-xl font-bold">Monitor patterns responsibly</p>
                                <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Simple dashboards help staff understand trends and prioritize interventions.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section data-reveal class="mt-16 grid gap-6 lg:grid-cols-3">
                    <div class="feature-card">
                        <span class="eyebrow">1. Report</span>
                        <h3 class="mt-4 text-2xl font-bold">Capture what happened</h3>
                        <p class="mt-3 text-[15px] leading-7 text-[var(--muted)]">Submit incident title, details, and location from phone or laptop with a clear, supportive interface.</p>
                    </div>
                    <div class="feature-card">
                        <span class="eyebrow">2. Monitor</span>
                        <h3 class="mt-4 text-2xl font-bold">Track the complaint journey</h3>
                        <p class="mt-3 text-[15px] leading-7 text-[var(--muted)]">See recent submissions, status distribution, and repeat areas of concern inside a dedicated dashboard.</p>
                    </div>
                    <div class="feature-card">
                        <span class="eyebrow">3. Respond</span>
                        <h3 class="mt-4 text-2xl font-bold">Build trust through action</h3>
                        <p class="mt-3 text-[15px] leading-7 text-[var(--muted)]">Use community signals to strengthen campus awareness programs, patrol routes, and intervention priorities.</p>
                    </div>
                </section>

                <section id="features" data-reveal class="mt-16 grid gap-6 lg:grid-cols-[1fr_1.05fr]">
                    <div class="soft-panel p-6 sm:p-8">
                        <span class="eyebrow">Built-in features</span>
                        <h2 class="mt-4 text-3xl font-bold">More than a form, this feels like a real campus safety system.</h2>
                        <div class="mt-6 grid gap-4 sm:grid-cols-2">
                            <div class="mini-stat">
                                <div class="feature-dot"></div>
                                <h3 class="mt-4 text-lg font-bold">Incident tracker</h3>
                                <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Recent reports stay visible with timestamps, locations, and live status chips.</p>
                            </div>
                            <div class="mini-stat">
                                <div class="feature-dot"></div>
                                <h3 class="mt-4 text-lg font-bold">Campus hotspot insight</h3>
                                <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Identify repeated unsafe areas and focus interventions where students need them most.</p>
                            </div>
                            <div class="mini-stat">
                                <div class="feature-dot"></div>
                                <h3 class="mt-4 text-lg font-bold">Student-first design</h3>
                                <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Soft visuals, calm forms, and mobile responsiveness reduce reporting friction.</p>
                            </div>
                            <div class="mini-stat">
                                <div class="feature-dot"></div>
                                <h3 class="mt-4 text-lg font-bold">Monitoring ready</h3>
                                <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Dashboards and summary cards create a clear monitoring workflow for campus teams.</p>
                            </div>
                        </div>
                    </div>

                    <div id="workflow" class="hero-mesh rounded-[2rem] p-6 text-white sm:p-8">
                        <span class="eyebrow border-white/20 bg-white/10 text-white">Safety workflow</span>
                        <div class="mt-6 space-y-6">
                            <div class="grid grid-cols-[auto_1fr] gap-4">
                                <div class="flex flex-col items-center">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white/15 font-bold">1</div>
                                    <div class="timeline-line mt-3 h-full w-px"></div>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold">Student notices an issue</h3>
                                    <p class="mt-2 text-sm leading-6 text-white/78">Unsafe routes, harassment, suspicious behavior, or repeat concerns can be captured quickly.</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-[auto_1fr] gap-4">
                                <div class="flex flex-col items-center">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white/15 font-bold">2</div>
                                    <div class="timeline-line mt-3 h-full w-px"></div>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold">Platform logs and highlights</h3>
                                    <p class="mt-2 text-sm leading-6 text-white/78">Reports appear in the dashboard with locations and status, making emerging patterns visible.</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-[auto_1fr] gap-4">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white/15 font-bold">3</div>
                                <div>
                                    <h3 class="text-xl font-bold">Campus teams take action</h3>
                                    <p class="mt-2 text-sm leading-6 text-white/78">Institutions can prioritize patrols, awareness campaigns, and support responses with stronger context.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section data-reveal class="mt-16 grid gap-6 lg:grid-cols-[1.05fr_0.95fr]">
                    <div class="soft-panel p-6 sm:p-8">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                            <div>
                                <span class="eyebrow">Campus hotspot board</span>
                                <h2 class="mt-4 text-3xl font-bold">See where attention should go first.</h2>
                            </div>
                            <p class="max-w-md text-sm leading-6 text-[var(--muted)]">A visual cue like this helps explain how repeated reports can translate into safer interventions.</p>
                        </div>

                        <div class="mt-8 space-y-5">
                            <div class="mini-stat">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-lg font-bold">Library rear corridor</p>
                                        <p class="mt-1 text-sm text-[var(--muted)]">Evening crowding and low supervision</p>
                                    </div>
                                    <span class="rounded-full bg-rose-100 px-3 py-1 text-xs font-bold uppercase tracking-[0.18em] text-rose-700">High</span>
                                </div>
                                <div class="heat-strip mt-4"></div>
                            </div>
                            <div class="mini-stat">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-lg font-bold">Hostel gate to parking lane</p>
                                        <p class="mt-1 text-sm text-[var(--muted)]">Late-night lighting and route discomfort</p>
                                    </div>
                                    <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-bold uppercase tracking-[0.18em] text-amber-800">Medium</span>
                                </div>
                                <div class="heat-strip mt-4 opacity-80"></div>
                            </div>
                            <div class="mini-stat">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-lg font-bold">Cafeteria side entrance</p>
                                        <p class="mt-1 text-sm text-[var(--muted)]">Periodic complaints, needs awareness watch</p>
                                    </div>
                                    <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold uppercase tracking-[0.18em] text-emerald-800">Low</span>
                                </div>
                                <div class="heat-strip mt-4 opacity-65"></div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-mesh rounded-[2rem] p-6 text-white sm:p-8">
                        <span class="eyebrow border-white/20 bg-white/10 text-white">Design direction</span>
                        <h2 class="mt-4 text-3xl font-bold">Calm enough for difficult reporting, strong enough for action.</h2>
                        <div class="mt-6 grid gap-4">
                            <div class="insight-card">
                                <p class="text-sm uppercase tracking-[0.22em] text-white/72">Visual language</p>
                                <p class="mt-2 text-lg font-bold">Warm gradients, soft glass panels, and clear spacing reduce intimidation.</p>
                            </div>
                            <div class="insight-card">
                                <p class="text-sm uppercase tracking-[0.22em] text-white/72">User experience</p>
                                <p class="mt-2 text-lg font-bold">Students get simple paths to report, while institutions get structured insight panels.</p>
                            </div>
                            <div class="insight-card">
                                <p class="text-sm uppercase tracking-[0.22em] text-white/72">Trust signal</p>
                                <p class="mt-2 text-lg font-bold">A polished interface makes the platform feel dependable, monitored, and intentional.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section data-reveal class="mt-16">
                    <div class="flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <span class="eyebrow">Support resources</span>
                            <h2 class="mt-4 text-3xl font-bold">Useful features around the reporting flow</h2>
                        </div>
                        <p class="max-w-2xl text-sm leading-6 text-[var(--muted)]">These sections make the platform feel like a real women’s safety hub, not only a single complaint form.</p>
                    </div>

                    <div class="mt-8 grid gap-6 lg:grid-cols-3">
                        <div class="resource-card">
                            <p class="text-sm font-bold uppercase tracking-[0.22em] text-[var(--brand-deep)]">Resource 1</p>
                            <h3 class="mt-3 text-2xl font-bold">Safety awareness campaigns</h3>
                            <p class="mt-3 text-sm leading-6 text-[var(--muted)]">Use the platform to promote campus walks, hotline reminders, and orientation-time safety messaging.</p>
                        </div>
                        <div class="resource-card">
                            <p class="text-sm font-bold uppercase tracking-[0.22em] text-[var(--brand-deep)]">Resource 2</p>
                            <h3 class="mt-3 text-2xl font-bold">Trusted reporting guidance</h3>
                            <p class="mt-3 text-sm leading-6 text-[var(--muted)]">Give students examples of what to include so reports are easier to understand and act on.</p>
                        </div>
                        <div class="resource-card">
                            <p class="text-sm font-bold uppercase tracking-[0.22em] text-[var(--brand-deep)]">Resource 3</p>
                            <h3 class="mt-3 text-2xl font-bold">Monitoring and response cues</h3>
                            <p class="mt-3 text-sm leading-6 text-[var(--muted)]">Track patterns, focus patrols, and surface locations that need lighting, signage, or staff attention.</p>
                        </div>
                    </div>
                </section>

                <section data-reveal class="mt-16 grid gap-6 lg:grid-cols-3">
                    <div class="voice-card">
                        <span class="eyebrow">Student voice</span>
                        <p class="mt-5 text-lg leading-8 text-[var(--text)]">“A system like this matters because the hardest part is often not the incident, but knowing where to begin reporting it.”</p>
                    </div>
                    <div class="voice-card">
                        <span class="eyebrow">Support team</span>
                        <p class="mt-5 text-lg leading-8 text-[var(--text)]">“Better visibility helps institutions focus on patterns instead of reacting too late to isolated complaints.”</p>
                    </div>
                    <div class="voice-card">
                        <span class="eyebrow">Campus admin</span>
                        <p class="mt-5 text-lg leading-8 text-[var(--text)]">“A clear dashboard gives us a stronger starting point for awareness drives, route safety, and follow-up.”</p>
                    </div>
                </section>

                <section id="faq" data-reveal class="mt-16 soft-panel p-6 sm:p-8" x-data="{ open: 0 }">
                    <div class="flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <span class="eyebrow">Quick FAQ</span>
                            <h2 class="mt-4 text-3xl font-bold">Questions students and institutions usually ask</h2>
                        </div>
                        <p class="max-w-xl text-sm leading-6 text-[var(--muted)]">A more complete frontend also means clearer guidance and better confidence for first-time users.</p>
                    </div>

                    <div class="mt-8 grid gap-4">
                        <div class="mini-stat">
                            <button type="button" class="flex w-full items-center justify-between gap-4 text-left" @click="open = open === 1 ? 0 : 1">
                                <span class="text-lg font-bold">What can be reported here?</span>
                                <span class="text-2xl font-light" x-text="open === 1 ? '-' : '+'"></span>
                            </button>
                            <p class="mt-3 text-sm leading-6 text-[var(--muted)]" x-show="open === 1" x-transition>Harassment, unsafe routes, suspicious activity, repeated discomfort zones, and safety-related campus incidents.</p>
                        </div>
                        <div class="mini-stat">
                            <button type="button" class="flex w-full items-center justify-between gap-4 text-left" @click="open = open === 2 ? 0 : 2">
                                <span class="text-lg font-bold">Why is location detail important?</span>
                                <span class="text-2xl font-light" x-text="open === 2 ? '-' : '+'"></span>
                            </button>
                            <p class="mt-3 text-sm leading-6 text-[var(--muted)]" x-show="open === 2" x-transition>Location data helps identify recurring problem areas so campuses can improve lighting, patrol planning, and support presence.</p>
                        </div>
                        <div class="mini-stat">
                            <button type="button" class="flex w-full items-center justify-between gap-4 text-left" @click="open = open === 3 ? 0 : 3">
                                <span class="text-lg font-bold">Who benefits from this system?</span>
                                <span class="text-2xl font-light" x-text="open === 3 ? '-' : '+'"></span>
                            </button>
                            <p class="mt-3 text-sm leading-6 text-[var(--muted)]" x-show="open === 3" x-transition>Students gain a calmer reporting experience, while institutions gain better visibility into concerns that need attention.</p>
                        </div>
                    </div>
                </section>

                <section data-reveal class="mt-16">
                    <div class="hero-mesh rounded-[2.25rem] px-6 py-10 text-white sm:px-10 sm:py-14">
                        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                            <div class="max-w-3xl">
                                <span class="eyebrow border-white/20 bg-white/10 text-white">Final call to action</span>
                                <h2 class="mt-4 text-4xl font-bold sm:text-5xl">Build a campus culture where reporting feels supported, visible, and worth doing.</h2>
                                <p class="mt-4 text-base leading-7 text-white/82">CampusSaathi is designed to help colleges and universities move from silent concerns to community-backed safety action.</p>
                            </div>
                            <div class="flex flex-wrap gap-4">
                                @auth
                                    <a href="{{ route('complaint.create') }}" class="btn-secondary">Report now</a>
                                    <a href="{{ route('dashboard') }}" class="btn-primary">Open dashboard</a>
                                @else
                                    <a href="{{ route('register') }}" class="btn-secondary">Create account</a>
                                    <a href="{{ route('login') }}" class="btn-primary">Sign in</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
