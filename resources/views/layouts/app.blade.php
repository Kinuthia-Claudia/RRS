<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        <div @click.away="open = false"
            class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-slate-100 md:w-64 dark:text-gray-200 dark:bg-gray-800"
            x-data="{ open: false }">
            <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                @if (Auth::check())
            @if (Auth::user()->isAdmin())
                <a href="{{ route('admin.index') }}"
                    class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">Admin Dashboard</a>
            @else
                <a href="{{ route('customer.index') }}"
                    class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">Customer Dashboard</a>
            @endif
        @else
            <a href="{{ route('login') }}"
                class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">Login</a>
        @endif
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'block': open, 'hidden': !open}"
                class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">

                @auth
    @if(Auth::user()->isAdmin())
        {{-- Admin Navigation Links --}}
        <x-admin-nav-link :href="route('admin.analytics.index')"
        :active="request()->routeIs('admin.analytics.index')">
        {{ __('Analytics') }}
    </x-admin-nav-link>
        <x-admin-nav-link :href="route('admin.categories.index')"
        :active="request()->routeIs('admin.categories.index')">
        {{ __('Categories') }}
    </x-admin-nav-link>
    <x-admin-nav-link :href="route('admin.menus.index')" :active="request()->routeIs('admin.menus.index')">
        {{ __('Menus') }}
    </x-admin-nav-link>
    <x-admin-nav-link :href="route('admin.tables.index')"
        :active="request()->routeIs('admin.tables.index')">
        {{ __('Tables') }}
    </x-admin-nav-link>
    <x-admin-nav-link :href="route('admin.reservations.index')"
        :active="request()->routeIs('admin.reservations.index')">
        {{ __('Reservations') }}
    </x-admin-nav-link>

<x-admin-nav-link :href="route('admin.users.index')"
:active="request()->routeIs('admin.users.index')">
{{ __('Users') }}
</x-admin-nav-link>

    @else
        {{-- Customer Navigation Links --}}
        <x-customer-nav-link :href="route('customer.profile.index')"
        :active="request()->routeIs('customer.profile.index')">
          {{ __('Profile') }}
           </x-customer-nav-link>
        <x-customer-nav-link :href="route('customer.myreservations.index')"
                             :active="request()->routeIs('customer.myreservations.index')">
            {{ __('My Reservations') }}
        </x-customer-nav-link>
        <x-customer-nav-link :href="route('customer.reviews.index')"
                             :active="request()->routeIs('customer.reviews.index')">
            {{ __('Leave a Review') }}
        </x-customer-nav-link>
        <x-customer-nav-link :href="route('home')"
        :active="request()->routeIs('home')">
         {{ __('Homepage') }}
</x-customer-nav-link>


    @endif

    @endauth


                <!-- Logout Button -->
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>{{ Auth::user()->name }}</span>
                        <svg fill="currentColor" viewBox="0 0 20 20"
                            :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                        <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <main class="m-2 p-8 w-full">
            <div>
                <!-- Alert Messages -->
                @if (session()->has('danger'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <span class="font-medium">{{ session()->get('danger') }}!</span>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                        role="alert">
                        <span class="font-medium">{{ session()->get('success') }}!</span>
                    </div>
                @endif
                @if (session()->has('warning'))
                    <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                        role="alert">
                        <span class="font-medium">{{ session()->get('warning') }}!</span>
                    </div>
                @endif
            </div>
            {{ $slot }}
        </main>
    </div>
</body>
<footer class="bg-gray-800 border-t border-gray-200">
    <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
        <div class="flex flex-wrap justify-center">
            <ul class="flex items-center space-x-4 text-white">


                <li>@copyright Restaurant 2024</li>
                <li><a href="{{ route('contactus') }}">Contact Us</a></li>
            </ul>
        </div>
        <div class="flex justify-center mt-4 lg:mt-0">
            <div class="flex flex-wrap justify-center">
                <ul class="flex items-center space-x-4 text-white">
                  <li>09 Langata Road Drive, Parklands </li>
                </ul>
            </div>
            <a>
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-6 h-6 text-blue-600" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
            </a>
            <a class="ml-3">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-6 h-6 text-blue-300" viewBox="0 0 24 24">
                    <path
                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                    </path>
                </svg>
            </a>
            <a class="ml-3">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-6 h-6 text-pink-400" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
            </a>
            <a class="ml-3">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="0" class="w-6 h-6 text-blue-500" viewBox="0 0 24 24">
                    <path stroke="none"
                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                    </path>
                    <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
            </a>
        </div>
    </div>
</footer>

</html>
