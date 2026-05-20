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
        <div class="min-h-screen">
            @include('layouts.navigation')

            @isset($header)
                <header class="shell pt-8 sm:pt-10">
                    <div class="glass-panel overflow-hidden px-6 py-8 sm:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="pb-16">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
