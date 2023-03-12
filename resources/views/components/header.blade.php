<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">     
        <style>
            body {
                font-family: 'fangsong';
            }
        </style>
    </head>
    <body class="antialiased">
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
    <div class="container flex flex-wrap items-center mx-auto">
        <button type="button" class="block sm:hidden px-2 py-1 text-gray-500 rounded hover:text-gray-800 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" aria-label="Toggle navigation" id="menu-toggle">
            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z"/></svg>
        </button>
        <ul class="hidden sm:flex flex-col p-2 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-l md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700" id="menu">
            <li>
                <a href="/" class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 text-s font-bold uppercase md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">Home</a>
            </li>
            <li>
                <a href="/projects" class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 text-s font-bold uppercase md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">Projects</a>
            </li>
            <li>
                <a href="/about" class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 text-s font-bold uppercase md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">About</a>
            </li>
        </ul>
        <div class="flex flex-wrap items-right ml-auto mr-8 mt-4 md:mt-0">
            @auth
            <span class="text-s font-bold uppercase">Logged as: {{ auth()->user()->name }} </span>
            @if (auth()->user()->isAdmin())
            <a href="/admin" class="ml-4 text-s font-bold uppercase">Admin</a>
            @endif
            <a href="/logout" class="ml-3 text-s font-bold uppercase">Logout</a>
            @else
            <a href="/login" class="ml-3 text-s font-bold uppercase">Log In</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('hidden');
    });
</script>

    </body>
