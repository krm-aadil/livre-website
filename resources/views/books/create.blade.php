<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
</head>
<body>
    <nav x-data="{ open: false }" class="bg-teal-800 border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-mark class="block h-9 w-auto" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                            class="text-white">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.index')">
                            {{ __('Manage Products') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Right Navigation -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <!-- Profile -->
                    <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')"
                        class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                        {{ __('Profile') }}
                    </x-nav-link>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-white ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            {{ __('Logout') }}
                        </x-nav-link>
                    </form>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Responsive Navigation Links -->
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                        class="text-white block">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')"
                        class="text-white block">
                        {{ __('Manage Users') }}
                    </x-nav-link>
                </div>

                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>
                        <div class="ml-2">
                            <x-nav-link href="{{ route('profile.show') }}"
                                :active="request()->routeIs('profile.show')" class="text-white">
                                {{ __('Profile') }}
                            </x-nav-link>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-white ml-4">
                            {{ __('Logout') }}
                        </x-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <div class="container">
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
        
                        <div class="mb-4">
                            <label for="name" class="block font-semibold text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="w-full rounded-lg border-gray-300 focus:outline-none focus:border-teal-400" value="{{ old('name') }}">
                        </div>
        
                        <div class="mb-4">
                            <label for="author" class="block font-semibold text-gray-700">Author</label>
                            <input type="text" name="author" id="author" class="w-full rounded-lg border-gray-300 focus:outline-none focus:border-teal-400" value="{{ old('author') }}">
                        </div>
        
                        <div class="mb-4">
                            <label for="category" class="block font-semibold text-gray-700">Category</label>
                            <select name="category" id="category" class="w-full rounded-lg border-gray-300 focus:outline-none focus:border-teal-400">
                                <option value="fantasy">Fantasy</option>
                                <option value="non-fantasy">Non-Fantasy</option>
                            </select>
                        </div>
        
                        <div class="mb-4">
                            <label for="price" class="block font-semibold text-gray-700">Price</label>
                            <input type="text" name="price" id="price" class="w-full rounded-lg border-gray-300 focus:outline-none focus:border-teal-400" value="{{ old('price') }}">
                        </div>
        
                        <div class="mb-4">
                            <label for="image" class="block font-semibold text-gray-700">Image</label>
                            <input type="file" name="image" id="image" class="w-full rounded-lg border-gray-300 focus:outline-none focus:border-teal-400">
                        </div>
        
                        <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
