<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'chatWebApp' }}</title>
        @livewireStyles
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        @assets('build/manifest.json')
    </head>
    <body>
        <x-chat-Navbar />
        <livewire:notify />
        <main>
            {{ $slot }}
        </main>
        


        @livewireScripts
    </body>
</html>
