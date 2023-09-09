<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

         <title>{{ $title ?? 'The Mary Parrish Center' }} - Housing Hope 2023</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.snipcart.com/themes/v3.2.0/default/snipcart.css" />
        <link rel="preconnect" href="https://app.snipcart.com">
        <link rel="preconnect" href="https://cdn.snipcart.com">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/556cea7374.js" crossorigin="anonymous"></script>
        
        <script src="//unpkg.com/alpinejs" defer></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173249724-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-173249724-2');
        </script>
    </head>
    <body>
        <x-public-navigation/>
        {{ $slot }}
    <div class="py-12 bg-mp-navy text-white text-sm text-center">Housing Hope Nashville - &copy; 2023 The Mary Parrish Center - Photo Credit: Peyton Hoge - Website Development: Amy Atkinson Communications</div>
    <script async src="https://cdn.snipcart.com/themes/v3.2.1/default/snipcart.js"></script>
    <div hidden id="snipcart" data-api-key="{{ env('SNIPCART_KEY') }}"></div>
    @livewireScripts
    </body>
</html>