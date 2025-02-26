<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Cup 2030 Morocco - Luxury Rentals</title>
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
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .float {
            animation: float 6s ease-in-out infinite;
        }

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

<body class="font-sans bg-light text-dark" x-data="{ mobileMenu: false }">
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
                    <a href="#" :class="{'text-dark hover:text-primary': isScrolled, 'text-white hover:text-primary': !isScrolled}" class="text-sm font-medium transition-all duration-300">Home</a>
                    <a href="/Announces" :class="{'text-dark hover:text-primary': isScrolled, 'text-white hover:text-primary': !isScrolled}" class="text-sm font-medium transition-all duration-300">Rental</a>

                    @auth
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('dashboard') }}" :class="{'bg-primary text-white': isScrolled, 'bg-white text-primary': !isScrolled}" class="px-5 py-2 text-sm font-medium transition-all duration-300 rounded-lg hover:shadow-lg">
                        {{ Auth::user()->name  }}
                    </a>
                    @elseif (Auth::user()->role == 'proprietaire')
                    <a href="{{ route('proprietaire_dashboard') }}" :class="{'bg-primary text-white': isScrolled, 'bg-white text-primary': !isScrolled}" class="px-5 py-2 text-sm font-medium transition-all duration-300 rounded-lg hover:shadow-lg">
                        {{ Auth::user()->name  }}
                    </a>
                    @elseif (Auth::user()->role == 'touriste')
                    <a href="{{ route('dashboard_touriste') }}" :class="{'bg-primary text-white': isScrolled, 'bg-white text-primary': !isScrolled}" class="px-5 py-2 text-sm font-medium transition-all duration-300 rounded-lg hover:shadow-lg">
                        {{ Auth::user()->name  }}
                    </a>
                    @endif
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
                <a href="#" class="block px-4 py-2 text-center text-white rounded-lg bg-primary hover:bg-opacity-90">Sign In</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="relative flex items-center justify-center h-screen overflow-hidden">
        <video autoplay loop muted class="absolute z-10 w-auto min-w-full min-h-full max-w-none">
            <source src="https://assets.mixkit.co/videos/preview/mixkit-aerial-view-of-city-of-agadir-in-morocco-40658-large.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 z-20 bg-gradient-to-r from-black/50 to-black/30"></div>
        <div class="relative z-30 max-w-3xl px-6 mx-auto text-center text-white">
            <span class="inline-block px-4 py-1 mb-6 text-xs font-medium tracking-wider uppercase bg-white rounded-full text-primary">World Cup 2030</span>
            <h1 class="mb-6 text-4xl font-bold leading-tight md:text-6xl">Experience Morocco in Style</h1>
            <p class="mb-8 text-lg opacity-90">Discover exclusive luxury rentals for an unforgettable World Cup experience in the heart of Morocco's most vibrant cities.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 sm:justify-center">
                <a href="#" class="px-8 py-3 font-medium text-white transition duration-300 rounded-lg bg-primary hover:bg-secondary hover:shadow-lg">Find Properties</a>
                <a href="#" class="px-8 py-3 font-medium transition duration-300 border rounded-lg text-light border-light hover:bg-white hover:text-primary">Learn More</a>
            </div>
        </div>
        <div class="absolute z-30 transform -translate-x-1/2 bottom-10 left-1/2">
            <svg class="w-10 h-10 text-white animate-bounce" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Search Section -->
    <section class="relative z-30 px-6 py-8 mx-auto -mt-16 max-w-7xl">
        <div class="p-6 bg-white shadow-xl rounded-xl">
            <form class="grid grid-cols-1 gap-4 md:grid-cols-4">
                <div class="space-y-2">
                    <label class="text-xs font-medium text-gray-500">Location</label>
                    <select class="w-full p-3 text-sm border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none">
                        <option>Any City</option>
                        <option>Casablanca</option>
                        <option>Marrakech</option>
                        <option>Rabat</option>
                        <option>Fes</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-medium text-gray-500">Check-in Date</label>
                    <input type="date" class="w-full p-3 text-sm border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-medium text-gray-500">Check-out Date</label>
                    <input type="date" class="w-full p-3 text-sm border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
                <div class="flex items-end">
                    <button class="w-full p-3 text-sm font-medium text-white transition duration-300 rounded-lg bg-primary hover:bg-secondary">Search Properties</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Rental Cards -->
    <section class="py-16 bg-light">
        <div class="container px-6 mx-auto">
            <div class="flex flex-col items-center justify-between mb-12 space-y-4 md:flex-row md:space-y-0">
                <h2 class="text-3xl font-bold">Featured Properties</h2>
                <a href="#" class="flex items-center text-sm font-medium text-primary hover:text-secondary">
                    View all properties
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <!-- Card 1 -->
                <div class="overflow-hidden transition duration-300 bg-white shadow-sm rounded-xl hover:shadow-lg">
                    <div class="relative">
                        <img src="https://www.visitmorocco.com/sites/default/files/styles/thumbnail_destination_background_top5/public/thumbnails/image/dar-el-bahar-fortress-at-safi-on-the-atlantic-coast-morocco-anibal-trejo_0.jpg?itok=P1b3ydVO" alt="Luxury Villa" class="object-cover w-full h-48">
                        <div class="absolute top-3 right-3">
                            <span class="px-2 py-1 text-xs font-medium text-white rounded-md bg-primary">Featured</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2 text-xs text-gray-500">
                            <svg class="w-4 h-4 mr-1 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            Marrakech
                        </div>
                        <h3 class="mb-2 text-lg font-semibold">Marrakech Oasis Villa</h3>
                        <p class="mb-4 text-sm text-gray-600 line-clamp-2">Luxurious villa with private pool and stunning views of the Atlas Mountains.</p>
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-primary">$500<span class="text-sm text-gray-500">/night</span></span>
                            <a href="#" class="px-3 py-1 text-xs font-medium text-white transition duration-300 rounded-lg bg-secondary hover:bg-opacity-90">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="overflow-hidden transition duration-300 bg-white shadow-sm rounded-xl hover:shadow-lg">
                    <div class="relative">
                        <img src="https://www.visitmorocco.com/sites/default/files/styles/thumbnail_destination_background_top5/public/thumbnails/image/dar-el-bahar-fortress-at-safi-on-the-atlantic-coast-morocco-anibal-trejo_0.jpg?itok=P1b3ydVO" alt="Beachfront Apartment" class="object-cover w-full h-48">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2 text-xs text-gray-500">
                            <svg class="w-4 h-4 mr-1 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            Casablanca
                        </div>
                        <h3 class="mb-2 text-lg font-semibold">Casablanca Beachfront</h3>
                        <p class="mb-4 text-sm text-gray-600 line-clamp-2">Modern apartment with breathtaking ocean views and direct beach access.</p>
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-primary">$350<span class="text-sm text-gray-500">/night</span></span>
                            <a href="#" class="px-3 py-1 text-xs font-medium text-white transition duration-300 rounded-lg bg-secondary hover:bg-opacity-90">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="overflow-hidden transition duration-300 bg-white shadow-sm rounded-xl hover:shadow-lg">
                    <div class="relative">
                        <img src="https://www.visitmorocco.com/sites/default/files/styles/thumbnail_destination_background_top5/public/thumbnails/image/dar-el-bahar-fortress-at-safi-on-the-atlantic-coast-morocco-anibal-trejo_0.jpg?itok=P1b3ydVO" alt="Riad" class="object-cover w-full h-48">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2 text-xs text-gray-500">
                            <svg class="w-4 h-4 mr-1 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            Fes
                        </div>
                        <h3 class="mb-2 text-lg font-semibold">Fes Medina Riad</h3>
                        <p class="mb-4 text-sm text-gray-600 line-clamp-2">Traditional riad with modern amenities in the historic Fes Medina.</p>
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-primary">$400<span class="text-sm text-gray-500">/night</span></span>
                            <a href="#" class="px-3 py-1 text-xs font-medium text-white transition duration-300 rounded-lg bg-secondary hover:bg-opacity-90">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="overflow-hidden transition duration-300 bg-white shadow-sm rounded-xl hover:shadow-lg">
                    <div class="relative">
                        <img src="https://www.visitmorocco.com/sites/default/files/styles/thumbnail_destination_background_top5/public/thumbnails/image/dar-el-bahar-fortress-at-safi-on-the-atlantic-coast-morocco-anibal-trejo_0.jpg?itok=P1b3ydVO" alt="Mountain Retreat" class="object-cover w-full h-48">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2 text-xs text-gray-500">
                            <svg class="w-4 h-4 mr-1 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            Rabat
                        </div>
                        <h3 class="mb-2 text-lg font-semibold">Rabat Luxury Apartment</h3>
                        <p class="mb-4 text-sm text-gray-600 line-clamp-2">Modern luxury apartment in the capital city with stunning city views.</p>
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-primary">$380<span class="text-sm text-gray-500">/night</span></span>
                            <a href="#" class="px-3 py-1 text-xs font-medium text-white transition duration-300 rounded-lg bg-secondary hover:bg-opacity-90">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container px-6 mx-auto">
            <div class="text-center mb-14">
                <span class="inline-block px-3 py-1 mb-4 text-xs font-medium tracking-wider text-white uppercase rounded-full bg-primary">Why Choose Us</span>
                <h2 class="mb-4 text-3xl font-bold">The Ultimate World Cup Experience</h2>
                <p class="max-w-2xl mx-auto text-gray-600">Experience Morocco's rich culture and World Cup excitement with our premium accommodations and services.</p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Feature 1 -->
                <div class="p-6 transition duration-300 bg-white border border-gray-100 rounded-xl hover:shadow-lg">
                    <div class="inline-flex items-center justify-center w-12 h-12 mb-4 text-white rounded-lg bg-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold">Prime Locations</h3>
                    <p class="text-gray-600">All our properties are strategically located near World Cup stadiums and key attractions.</p>
                </div>
                <!-- Feature 2 -->
                <div class="p-6 transition duration-300 bg-white border border-gray-100 rounded-xl hover:shadow-lg">
                    <div class="inline-flex items-center justify-center w-12 h-12 mb-4 text-white rounded-lg bg-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold">24/7 Concierge</h3>
                    <p class="text-gray-600">Our dedicated team is available around the clock to assist with any requests or emergencies.</p>
                </div>
                <!-- Feature 3 -->
                <div class="p-6 transition duration-300 bg-white border border-gray-100 rounded-xl hover:shadow-lg">
                    <div class="inline-flex items-center justify-center w-12 h-12 mb-4 text-white rounded-lg bg-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-semibold">Secure Booking</h3>
                    <p class="text-gray-600">Our payment system ensures your booking and personal information remain safe and secure.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section class="relative py-16 overflow-hidden bg-gray-50">
        <div class="container px-6 mx-auto">
            <div class="flex flex-col items-center justify-between mb-12 space-y-4 md:flex-row md:space-y-0">
                <h2 class="text-3xl font-bold">Explore Host Cities</h2>
                <a href="#" class="flex items-center text-sm font-medium text-primary hover:text-secondary">
                    View all cities
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <!-- City 1 -->
                <div class="relative overflow-hidden transition duration-300 rounded-xl group hover:shadow-xl">
                    <img src="https://media.istockphoto.com/id/177235258/fr/photo/le-maroc.jpg?s=612x612&w=0&k=20&c=9wwdgJzmD3avw7_H8r1VPXbmzosJAlOUy4rgr9BYatI=" alt="Casablanca" class="object-cover w-full h-64 transition duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="mb-2 text-xl font-bold text-white">Casablanca</h3>
                        <div class="flex items-center text-white">
                            <span class="mr-2 text-sm opacity-90">42 properties</span>
                            <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- City 2 -->
                <div class="relative overflow-hidden transition duration-300 rounded-xl group hover:shadow-xl">
                    <img src="https://media.istockphoto.com/id/177235258/fr/photo/le-maroc.jpg?s=612x612&w=0&k=20&c=9wwdgJzmD3avw7_H8r1VPXbmzosJAlOUy4rgr9BYatI=" alt="Marrakech" class="object-cover w-full h-64 transition duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="mb-2 text-xl font-bold text-white">Marrakech</h3>
                        <div class="flex items-center text-white">
                            <span class="mr-2 text-sm opacity-90">56 properties</span>
                            <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- City 3 -->
                <div class="relative overflow-hidden transition duration-300 rounded-xl group hover:shadow-xl">
                    <img src="https://media.istockphoto.com/id/177235258/fr/photo/le-maroc.jpg?s=612x612&w=0&k=20&c=9wwdgJzmD3avw7_H8r1VPXbmzosJAlOUy4rgr9BYatI=" alt="Rabat" class="object-cover w-full h-64 transition duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="mb-2 text-xl font-bold text-white">Rabat</h3>
                        <div class="flex items-center text-white">
                            <span class="mr-2 text-sm opacity-90">25 properties</span>
                            <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- City 4 -->
                <div class="relative overflow-hidden transition duration-300 rounded-xl group hover:shadow-xl">
                    <img src="https://media.istockphoto.com/id/177235258/fr/photo/le-maroc.jpg?s=612x612&w=0&k=20&c=9wwdgJzmD3avw7_H8r1VPXbmzosJAlOUy4rgr9BYatI=" alt="Tangier" class="object-cover w-full h-64 transition duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="mb-2 text-xl font-bold text-white">Tangier</h3>
                        <div class="flex items-center text-white">
                            <span class="mr-2 text-sm opacity-90">21 properties</span>
                            <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
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
            <p class="mt-6 text-center text-gray-600">Copyright &copy; 2023 Morocco Property. All rights reserved.</p>
        </div>
    </footer>