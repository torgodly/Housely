<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/ol@v7.3.0/dist/ol.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.3.0/ol.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('scripts')
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-white">
    @include('layouts.public_navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif


    {{-- TODO: lesten for flash succsess message--}}
    @if (session()->has('Message'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
            <div x-data="{ show: true }"
                 x-show="show"
                 x-transition
                 x-init="setTimeout(() => show = false, 2000)"
                 class="flex p-4  text-sm text-green-800 border border-green-300 rounded-lg bg-green-50  items-center"
                 role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                     viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="font-bold ">
                    <span class="font-medium text-base">{{__('Message')}}!</span> {{ session('Message') }}
                </div>
            </div>

        </div>
    @endif
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    <x-footer></x-footer>

</div>
@livewireScripts
</body>
</html>
