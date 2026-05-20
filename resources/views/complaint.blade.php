<x-app-layout>
    <x-slot name="header">
        <div class="grid gap-6 lg:grid-cols-[1fr_0.7fr] lg:items-center">
            <div>
                <span class="eyebrow">Secure reporting</span>
                <h1 class="mt-4 text-3xl font-bold sm:text-4xl">Submit a campus safety complaint</h1>
                <p class="mt-3 max-w-2xl text-base leading-7 text-[var(--muted)]">
                    Share what happened, where it happened, and the details that can help the concern be monitored responsibly.
                </p>
            </div>

            <div class="rounded-[1.75rem] bg-[var(--surface-strong)] p-5">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--brand-deep)]">Helpful note</p>
                <p class="mt-3 text-sm leading-7 text-[var(--muted)]">
                    Clear descriptions, approximate timing, and specific campus locations make it easier to identify patterns and improve response quality.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="shell mt-8">
        <div data-reveal class="grid gap-6 lg:grid-cols-[1fr_0.72fr]">
            <section class="soft-panel p-6 sm:p-8">
                @if (session('success'))
                    <div class="mb-6 rounded-[1.5rem] border border-emerald-200 bg-emerald-50 px-4 py-4 text-sm text-emerald-800">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('complaint.store') }}" class="space-y-6">
                    @csrf

                    <div class="mini-stat">
                        <p class="text-sm font-bold uppercase tracking-[0.2em] text-[var(--brand-deep)]">Common report types</p>
                        <div class="mt-4 flex flex-wrap gap-3">
                            <span class="rounded-full bg-[var(--surface-strong)] px-4 py-2 text-sm font-semibold">Harassment</span>
                            <span class="rounded-full bg-[var(--surface-strong)] px-4 py-2 text-sm font-semibold">Unsafe route</span>
                            <span class="rounded-full bg-[var(--surface-strong)] px-4 py-2 text-sm font-semibold">Suspicious behavior</span>
                            <span class="rounded-full bg-[var(--surface-strong)] px-4 py-2 text-sm font-semibold">Lighting concern</span>
                            <span class="rounded-full bg-[var(--surface-strong)] px-4 py-2 text-sm font-semibold">Repeat hotspot</span>
                        </div>
                    </div>

                    <div>
                        <label for="title" class="field-label">Report title</label>
                        <input id="title"
                               type="text"
                               name="title"
                               value="{{ old('title') }}"
                               class="field-input"
                               placeholder="Example: Harassment near library block">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="location" class="field-label">Location</label>
                        <input id="location"
                               type="text"
                               name="location"
                               value="{{ old('location') }}"
                               class="field-input"
                               placeholder="Example: Hostel gate, cafeteria lane, science block">
                        @error('location')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="field-label">Detailed description</label>
                        <textarea id="description"
                                  name="description"
                                  rows="7"
                                  class="field-input min-h-[180px]"
                                  placeholder="Explain what happened, when it happened, and any context that may help with monitoring or follow-up.">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <button type="submit" class="btn-primary">
                            Submit complaint
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn-secondary-dark">
                            Back to dashboard
                        </a>
                    </div>
                </form>
            </section>

            <aside class="space-y-6">
                <div class="hero-mesh rounded-[2rem] p-6 text-white sm:p-8">
                    <span class="eyebrow border-white/20 bg-white/10 text-white">Before you submit</span>
                    <ul class="mt-5 space-y-3 text-sm leading-7 text-white/82">
                        <li>Use a short but clear title describing the concern.</li>
                        <li>Mention the campus area as specifically as you can.</li>
                        <li>Describe the incident calmly and factually.</li>
                    </ul>
                </div>

                <div class="soft-panel p-6 sm:p-8">
                    <span class="eyebrow">What happens next</span>
                    <div class="mt-5 space-y-5">
                        <div>
                            <h3 class="text-lg font-bold">Complaint is recorded</h3>
                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Your report is stored in the platform and attached to your account.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold">Dashboard reflects status</h3>
                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">You can monitor recent complaints and see whether they are pending, reviewed, or resolved.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold">Patterns become visible</h3>
                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Repeated areas and incidents help campuses focus on prevention and response.</p>
                        </div>
                    </div>
                </div>

                <div class="soft-panel p-6 sm:p-8">
                    <span class="eyebrow">Helpful features</span>
                    <div class="mt-5 grid gap-4">
                        <div class="mini-stat">
                            <p class="text-lg font-bold">Clear campus location tracking</p>
                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Every report is easier to monitor when the place is specific and recognizable.</p>
                        </div>
                        <div class="mini-stat">
                            <p class="text-lg font-bold">Timeline-friendly records</p>
                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Complaint history on the dashboard helps students follow what they have already submitted.</p>
                        </div>
                        <div class="mini-stat">
                            <p class="text-lg font-bold">Supportive UX</p>
                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">The form uses a calm visual structure to make difficult reporting feel less intimidating.</p>
                        </div>
                    </div>
                </div>

                <div class="hero-mesh rounded-[2rem] p-6 text-white sm:p-8">
                    <span class="eyebrow border-white/20 bg-white/10 text-white">Privacy and confidence</span>
                    <h3 class="mt-4 text-2xl font-bold">Designed to feel supportive while you report.</h3>
                    <p class="mt-3 text-sm leading-7 text-white/82">
                        The layout uses calm colors, clear spacing, and plain-language prompts so the reporting experience feels more reassuring and less overwhelming.
                    </p>
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>
