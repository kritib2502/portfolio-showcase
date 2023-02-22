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
    <ul class="flex flex-col p-2 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-l md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
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
     
{{--       
                @if (session()->has('success'))
          <div class="md:flex md:justify-center md:items-center">
        <p class="text-xs font-bold uppercase border border-green-700 rounded px-4 py-2">
            {{ session()->get('success')}}
        </p>
        </div>
      @endif --}}
     
  </div>
</nav>
    </body>
