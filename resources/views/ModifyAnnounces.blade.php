<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayMorocco - Update Announce</title>
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

    <!-- Update Announce Form Section -->
    <section class="pt-32 pb-12 bg-gradient-to-r from-primary to-secondary">
        <div class="container px-6 mx-auto">
            <div class="max-w-3xl text-white">
                <h1 class="mb-4 text-4xl font-bold">Update Announce</h1>
                <p class="text-lg opacity-90">Edit the form below to update your property listing.</p>
            </div>
        </div>
    </section>

    <!-- Form Container -->
    <section class="container px-6 py-12 mx-auto">
        <div class="p-8 bg-white rounded-lg shadow-lg">
            <form action="/ModifyAnnounce" method="POST" class="space-y-6">
                @csrf <!-- CSRF Token for security -->

                <!-- Titre -->
                <input type="hidden" name="id" value="{{ $annonce->id }}">

                <div>
                    <label for="titre" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="titre" id="titre" required class="w-full p-3 mt-1 border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none" value="{{ $annonce->titre }}" placeholder="Enter property title">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" required class="w-full p-3 mt-1 border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none" placeholder="Enter property description">{{ $annonce->description }}</textarea>
                </div>

                <!-- Localisation -->
                <div>
                    <label for="localisation" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="localisation" id="localisation" required class="w-full p-3 mt-1 border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none" value="{{ $annonce->localisation }}" placeholder="Enter property location">
                </div>

                <!-- Equipements -->
                <div>
                    <label for="equipements" class="block text-sm font-medium text-gray-700">Amenities</label>
                    <input type="text" name="equipements" id="equipements" required class="w-full p-3 mt-1 border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none" value="{{ $annonce->equipements }}" placeholder="Enter amenities (separated by commas)">
                </div>

                <!-- Disponibilites -->
                <div>
                    <label for="disponibilites" class="block text-sm font-medium text-gray-700">Availability Date</label>
                    <input type="date" name="disponibilites" id="disponibilites" required class="w-full p-3 mt-1 border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none" value="{{ $annonce->disponibilites }}">
                </div>

                <!-- Image URL -->
                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL</label>
                    <input type="url" name="image_url" id="image_url" class="w-full p-3 mt-1 border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none" value="{{ $annonce->image_url }}" placeholder="Enter image URL (optional)">
                </div>

                <!-- Prix -->
                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700">Price per Night</label>
                    <input type="number" name="prix" id="prix" step="0.01" class="w-full p-3 mt-1 border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none" value="{{ $annonce->prix }}" placeholder="Enter price (optional)">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-primary hover:bg-secondary">Update Announce</button>
                </div>
            </form>
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

