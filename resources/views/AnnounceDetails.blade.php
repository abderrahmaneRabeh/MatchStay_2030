<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayMorocco - Property Details</title>
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

<body class="font-sans bg-gray-50 text-dark" x-data="{ mobileMenu: false }">
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

    <!-- Property Details Section -->
    <section class="pt-32 pb-12 bg-gradient-to-r from-primary to-secondary">
        <div class="container px-6 mx-auto">
            <div class="max-w-3xl text-white">
                <h1 class="mb-4 text-4xl font-bold">{{ $annonce->titre }}</h1>
                <p class="text-lg opacity-90">{{ $annonce->localisation }}</p>
            </div>
        </div>
    </section>

    <!-- Property Images & Details -->
    <section class="container px-6 py-12 mx-auto">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <!-- Property Images -->
            <div class="space-y-4">
                <div class="overflow-hidden rounded-lg">
                    <img src="{{ $annonce->image_url }}" alt="Property Image" class="object-cover w-full h-96">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ $annonce->image_url }}" alt="Property Image" class="object-cover w-full h-32">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ $annonce->image_url }}" alt="Property Image" class="object-cover w-full h-32">
                    </div>
                </div>

                <!-- Add to Favorites Button -->
                 @if ($isUserFavorite)
                 <div class="flex items-center space-x-4">
                     <a href="/announce/favorite/remove/{{ $annonce->id }}" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:bg-secondary">
                         Remove from Favorites
                     </a>
                 </div>

                 @else

                 <div class="flex items-center space-x-4">
                     <a href="/announce/favorite/add/{{ $annonce->id }}" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:bg-secondary">
                         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </a>
                </div>
                @endif
            </div>

            <!-- Property Details -->
            <div class="space-y-6">
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h2 class="mb-4 text-2xl font-semibold">Property Details</h2>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="text-gray-600">{{ $annonce->titre }}</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-600">{{ $annonce->localisation }}</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">Available to {{ $annonce->disponibilites }}</span>
                        </div>
                    </div>
                </div>

                <!-- Property Description -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h2 class="mb-4 text-2xl font-semibold">Description</h2>
                    <p class="text-gray-600">{{ $annonce->description }}</p>
                </div>

                <!-- Property Amenities -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h2 class="mb-4 text-2xl font-semibold">Amenities</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <?php $equipements = array_filter(explode('@', $annonce->equipements)); ?>
                        @foreach ($equipements as $equipement)
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600">{{ $equipement }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-between p-6 bg-white rounded-lg shadow-lg">
                    <a href="/ModifyAnnounce/{{ $annonce->id }}" class="px-4 py-2 text-center text-white transition duration-300 rounded-lg bg-primary hover:bg-opacity-90">Modify</a>
                    <form action="/DeleteAnnounce/{{ $annonce->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this announcement?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-center text-white transition duration-300 bg-red-600 rounded-lg hover:bg-opacity-90">Delete</button>
                    </form>
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
            <p class="mt-6 text-center text-gray-600">Copyright &copy; 2025 Morocco Property. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
