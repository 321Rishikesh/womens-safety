<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CampusSaathi') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="relative min-h-screen overflow-hidden px-4 py-6 sm:px-6 lg:px-8">
            <div class="shell grid min-h-[calc(100vh-3rem)] items-center gap-8 lg:grid-cols-[1.1fr_0.9fr]">
                <section class="hero-mesh relative overflow-hidden rounded-[2rem] px-6 py-10 text-white shadow-2xl sm:px-10 sm:py-14">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.18),transparent_16rem)]"></div>
                    <div class="relative">
                        <a href="/" class="mb-10 inline-flex items-center gap-3">
                            <x-application-logo class="h-12 w-12" />
                            <div>
                                <p class="font-['Space_Grotesk'] text-xl font-bold">CampusSaathi</p>
                                <p class="text-sm text-white/75">Community reporting and monitoring for safer campuses</p>
                            </div>
                        </a>

                        <span class="eyebrow border-white/20 bg-white/10 text-white">Trusted reporting</span>
                        <h1 class="mt-6 max-w-xl text-4xl font-bold leading-tight sm:text-5xl">
                            Support safer college spaces with secure, student-first reporting.
                        </h1>
                        <p class="mt-5 max-w-2xl text-base leading-7 text-white/82 sm:text-lg">
                            Help students report incidents, flag unsafe areas, and create a visible culture of accountability across universities.
                        </p>

                        <div class="mt-10 grid gap-4 sm:grid-cols-3">
                            <div class="rounded-3xl border border-white/15 bg-white/10 p-4">
                                <p class="text-3xl font-bold">24/7</p>
                                <p class="mt-2 text-sm text-white/75">Always-open reporting access</p>
                            </div>
                            <div class="rounded-3xl border border-white/15 bg-white/10 p-4">
                                <p class="text-3xl font-bold">Safe</p>
                                <p class="mt-2 text-sm text-white/75">Built for confidential campus concerns</p>
                            </div>
                            <div class="rounded-3xl border border-white/15 bg-white/10 p-4">
                                <p class="text-3xl font-bold">Action</p>
                                <p class="mt-2 text-sm text-white/75">Track trends and response priorities</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="glass-panel mx-auto w-full max-w-xl px-6 py-8 sm:px-8">
                    {{ $slot }}
                </section>
            </div>
        </div>
    </body>
</html>
