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
        <style>
            .web-bg {
                background-color: rgb(14, 1, 17);
                color: white;
            }
    
            .card-hd {
                background-color: #17001f;
                color: white;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .web-bg {
                background-color: rgb(14, 1, 17);
                color: white;
            }
    
            .card-hd {
                background-color: #17001f;
                color: white;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 web-bg ">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="card-hd shadow ">
                    <div class="max-w-7xl web-bg mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="">
                {{ $slot }}
            </main>
            
        </div>
    </body>
</html>
