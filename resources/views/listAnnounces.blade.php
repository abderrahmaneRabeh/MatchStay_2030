<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayMorocco - Luxury Rental Listings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#34D399',
                        secondary: '#10B981',
                        accent: '#059669',
                        dark: '#1F2937',
                        light: '#F9FAFB'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        ::-webkit-scrollbar {
            width: 0.5em;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: lightgreen;
            border-radius: 10px;
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-dark" x-data="{ mobileMenu: false, filters: false }">
    <!-- Header -->
    <header class="fixed z-50 w-full transition-all duration-300" x-data="{ isScrolled: false }" @scroll.window="isScrolled = (window.pageYOffset > 20)">
        <nav :class="{'glass-effect': !isScrolled, 'bg-white shadow-md': isScrolled}" class="container px-6 py-4 mx-auto transition-all duration-300">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-8 h-8 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" :class="{'text-primary': isScrolled, 'text-white': !isScrolled}" />
                        <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" :class="{'text-primary': isScrolled, 'text-white': !isScrolled}" />
                    </svg>
                    <span :class="{'text-dark': isScrolled, 'text-white': !isScrolled}" class="text-lg font-medium transition-all duration-300">StayMorocco</span>
                </div>
                <div class="items-center hidden space-x-8 md:flex">
                    <a href="/home" :class="{'text-dark hover:text-primary': isScrolled, 'text-white hover:text-primary': !isScrolled}" class="text-sm font-medium transition-all duration-300">Home</a>
                    <a href="#" :class="{'text-dark hover:text-primary': isScrolled, 'text-white hover:text-primary': !isScrolled}" class="text-sm font-medium transition-all duration-300">Properties</a>
                    @auth
                    <a href="/profile" :class="{'bg-primary text-white': isScrolled, 'bg-white text-primary': !isScrolled}" class="px-5 py-2 text-sm font-medium transition-all duration-300 rounded-lg hover:shadow-lg">{{ Auth::user()->name }}</a>
                    @endauth
                </div>
                <div class="md:hidden">
                    <button @click="mobileMenu = !mobileMenu" :class="{'text-dark': isScrolled, 'text-white': !isScrolled}" class="focus:outline-none">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="p-6 mt-4 space-y-4 bg-white rounded-lg shadow-lg md:hidden">
                <a href="#" class="block text-dark hover:text-primary">Home</a>
                <a href="#" class="block text-dark hover:text-primary">Properties</a>
                <a href="#" class="block px-4 py-2 text-center text-white rounded-lg bg-primary hover:bg-opacity-90">Sign In</a>
            </div>
        </nav>
    </header>

    <!-- Page Title Banner -->
    <section class="relative pt-32 pb-12 bg-gradient-to-r from-primary to-secondary">
        <div class="container px-6 mx-auto">
            <div class="max-w-3xl text-white">
                <h1 class="mb-4 text-4xl font-bold">Luxury Rentals for World Cup 2030</h1>
                <p class="text-lg opacity-90">Find your perfect accommodation in Morocco's most vibrant cities.</p>
            </div>
        </div>
        <div class="absolute bottom-0 right-0 hidden xl:block">
            <svg class="w-64 h-64 text-white opacity-10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </div>
    </section>

    <!-- Search & Filters -->
    <section class="relative z-30 px-6 py-8 mx-auto -mt-6 max-w-7xl">
        <div class="p-6 bg-white shadow-xl rounded-xl">
            <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
                <form action="/Announces" method="GET" class="flex flex-col w-full md:flex-row md:space-x-4">
                    <div class="relative flex-grow">
                        <input type="text" name="search" placeholder="Search by property name or keyword" class="w-full p-3 pl-10 text-sm border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none">
                        <svg class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-3 top-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button type="submit" class="flex items-center px-4 py-3 text-sm font-medium text-white rounded-lg bg-primary hover:bg-secondary">
                        Search
                    </button>
                    <a href="/Announces" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-primary">
                            reset
                </a>
                </form>
            </div>
        </div>
    </section>

    <!-- Results Count & Sort -->
    <section class="container px-6 py-6 mx-auto">
        <div class="flex flex-col items-center justify-between mb-6 md:flex-row">
            <div class="flex items-center space-x-4">
                @if (Auth::user()->role == "proprietaire")
                <a href="/AddAnnounce" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:bg-secondary">
                    Add new announce
                </a>
                @else
                <p class="text-sm font-medium text-green-600">{{ __('Welcome') }}, {{ Auth::user()->name }}!</p>
                @endif
            </div>
            <div class="flex items-center space-x-4">
                <label class="text-sm">Annonce per page:</label>
                <select name="paginate" id="paginate" onchange="window.location.href=`/Announces/${this.value}`">
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="12">12</option>
                </select>
            </div>

        </div>
    </section>

    <!-- Property Listings -->
    <section class="container px-6 pb-16 mx-auto">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($Announces as $announce)
            <!-- Card 1 -->
            <div class="overflow-hidden transition duration-300 bg-white shadow-sm rounded-xl hover:shadow-lg">
                <div class="relative">
                    @if ($announce->image_url)
                    <img src="{{ $announce->image_url }}" alt="Property Image" class="object-cover w-full h-48">
                    @else
                    <img src="https://www.visitmorocco.com/sites/default/files/styles/thumbnail_destination_background_top5/public/thumbnails/image/tour-hassan-rabat-morocco-by-migel.jpg?itok=YP8GLwSi" alt="Property Image" class="object-cover w-full h-48">
                    @endif
                    <div class="absolute top-3 right-3">
                        <span class="px-2 py-1 text-xs font-medium text-white rounded-md bg-primary">{{ $announce->proprietaire->name }}</span>
                    </div>
                    <div class="absolute top-3 left-3">
                        <span class="px-2 py-1 text-xs font-medium text-white rounded-md bg-dark">Ville</span>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2 text-xs text-gray-500">
                        <svg class="w-4 h-4 mr-1 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $announce->localisation }}
                    </div>
                    <h3 class="mb-2 text-lg font-semibold">{{ $announce->titre }}</h3>
                    <p class="mb-4 text-sm text-gray-600 line-clamp-2">{{ Str::limit($announce->description, 40) }}</p>
                    <div class="flex mb-4 text-xs text-gray-500">
                        <?php $equipements = array_filter(explode('@', $announce->equipements)); ?>
                        @foreach ($equipements as $equipement)
                        <div class="flex items-center mr-4">
                            <svg class="w-4 h-4 mr-1 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 3a1 1 0 00-1 1v12a1 1 0 002 0V4a1 1 0 00-1-1zM13 3a1 1 0 00-1 1v12a1 1 0 002 0V4a1 1 0 00-1-1z"></path>
                                <path d="M3 7a1 1 0 00-1 1v8a1 1 0 002 0V8a1 1 0 00-1-1zM17 7a1 1 0 00-1 1v8a1 1 0 002 0V8a1 1 0 00-1-1z"></path>
                            </svg>
                            <span>{{ $equipement }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-primary">${{ $announce->prix }}<span class="text-sm text-gray-500">/night</span></span>
                        <a href="/Announces/details/{{ $announce->id }}" class="px-3 py-1 text-xs font-medium text-white transition duration-300 rounded-lg bg-secondary hover:bg-opacity-90">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Pagination -->
    <section class="container px-6 py-6 mx-auto">
        <div class="flex justify-center">
            {{ $Announces->links('vendor.pagination.tailwind') }}
        </div>
    </section>


    <!-- Footer Section -->
    <footer class="py-12 bg-gray-100">
        <div class="container px-6 mx-auto">
            <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
                <a href="#" class="text-2xl font-bold text-primary">Morocco Property</a>
                <ul class="flex flex-wrap items-center justify-center space-x-4">
                    <li><a href="#" class="text-sm text-gray-600 hover:text-secondary">About</a></li>
                    <li><a href="#" class="text-sm text-gray-600 hover:text-secondary">Contact</a></li>
                    <li><a href="#" class="text-sm text-gray-600 hover:text-secondary">Terms</a></li>
                    <li><a href="#" class="text-sm text-gray-600 hover:text-secondary">Privacy</a></li>
                </ul>
            </div>
            <p class="mt-6 text-center text-gray-600">Copyright &copy; 2025 Morocco Property. All rights reserved.</p>
        </div>
    </footer>
