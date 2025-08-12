<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#111827]">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[#1f2937] shadow-md overflow-hidden sm:rounded-lg border-4 border-[#FFD700]">
                <a href="{{ url('/') }}" class="flex justify-center mb-4">
                    <img src="{{ asset('images/sgplogo.png') }}" alt="SGP Agency" class="h-64">
                </a>
                {{ $slot }}
            </div>

        </div>
    </body>
</html>
