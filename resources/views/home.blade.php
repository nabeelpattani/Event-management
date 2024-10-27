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
    <div class="min-h-screen flex flex-col pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900 px-4 py-2 overflow-y-scroll">
        <h1 class="text-xl">Upcoming Events</h1>
        <div class="grid grid-cols-1 md:grid-cols-4">
            @foreach ($events as $event)
                <div class="bg-white flex m-2 px-2 py-3 rounded-md shadow-sm">
                    <div class="flex flex-col w-1/2 flex-shrink-1">
                        <h2>{{ $event->name }}</h2>
                        <p>{{ $event->description }}</p>
                        <p>{{ $event->event_date }}</p>
                    </div>
                    <div class="flex justify-end items-center flex-grow-1">
                        <a
                        class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"
                            href="{{ route('events.show', $event) }}">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
