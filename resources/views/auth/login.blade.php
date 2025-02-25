<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Cup 2030 Morocco - Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        morocco: {
                            red: '#c1272d',
                            green: '#006233'
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @keyframes wave {
            0% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0); }
        }
        .wave-animation {
            animation: wave 5s infinite ease-in-out;
        }
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23006233' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="min-h-screen font-sans bg-gray-50 bg-pattern" x-data="{ rememberMe: false, password: '', showPassword: false }">
    <div class="flex min-h-screen">
        <!-- Left Side - Image & Animation -->
        <div class="relative hidden overflow-hidden lg:flex lg:w-1/2 bg-morocco-green">
            <div class="absolute inset-0 bg-morocco-green opacity-90"></div>
            <div class="relative z-10 flex flex-col items-center justify-center p-12 text-white">
                <div class="mb-8 wave-animation">
                    <svg class="w-32 h-32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 4L38.6 23.4H59L42.2 35.2L48.8 54.6L32 42.8L15.2 54.6L21.8 35.2L5 23.4H25.4L32 4Z" fill="#c1272d"/>
                    </svg>
                </div>
                <h1 class="mb-4 text-4xl font-bold text-center">World Cup 2030</h1>
                <h2 class="mb-6 text-2xl text-center">Morocco Rental Hub</h2>
                <p class="max-w-lg mb-6 text-lg text-center">Find the perfect accommodation for your World Cup 2030 experience in beautiful Morocco.</p>
                <div class="flex mt-4 space-x-4">
                    <i class="text-6xl fas fa-landmark"></i>
                    <i class="text-6xl fas fa-mosque"></i>
                    <i class="text-6xl fas fa-building"></i>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="flex items-center justify-center w-full p-8 lg:w-1/2">
            <div class="w-full max-w-md">
                <div class="mb-10 text-center">
                    <h2 class="mb-2 text-3xl font-bold text-gray-800">Welcome Back</h2>
                    <p class="text-gray-600">Sign in to access your account</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <!-- Session Status -->
                    <div class="mb-4"></div>

                    <!-- Email Address -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa fa-envelope text-morocco-green"></i>
                        </div>
                        <input id="email" type="email" name="email" required autofocus autocomplete="username" placeholder="Email Address"
                               class="w-full px-4 py-3 pl-10 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco-green focus:border-transparent" />
                    </div>
                    <div class="text-sm text-red-500"></div>

                    <!-- Password -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa fa-lock text-morocco-green"></i>
                        </div>
                        <input
                            id="password"
                            :type="showPassword ? 'text' : 'password'"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Password"
                            x-model="password"
                            class="w-full px-4 py-3 pl-10 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco-green focus:border-transparent" />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <button type="button" @click="showPassword = !showPassword" class="text-morocco-green focus:outline-none">
                                <i class="fa" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-sm text-red-500"></div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <div class="relative inline-block w-10 mr-2 align-middle select-none">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                x-model="rememberMe"
                                class="hidden" />
                            <label
                                for="remember_me"
                                class="block h-6 overflow-hidden bg-gray-300 rounded-full cursor-pointer"
                                :class="{'bg-morocco-green': rememberMe}"
                            >
                                <span
                                    class="block w-6 h-6 transition-transform duration-300 ease-in-out transform bg-white rounded-full shadow"
                                    :class="{'translate-x-4': rememberMe}"
                                ></span>
                            </label>
                        </div>
                        <label for="remember_me" class="text-sm text-gray-600 cursor-pointer select-none">Remember me</label>

                        <div class="ml-auto">
                            <a href="{{ route('password.request') }}" class="text-sm text-morocco-green hover:underline">Forgot password?</a>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 font-medium text-white transition-transform duration-200 transform rounded-lg bg-morocco-green hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-morocco-green hover:scale-105">
                        Sign In
                    </button>

                    <div class="mt-6 text-center">
                        <span class="text-sm text-gray-600">Don't have an account?</span>
                        <a href="{{ route('register') }}" class="ml-1 text-sm font-medium text-morocco-green hover:underline">Sign up</a>
                    </div>

                    <!-- <div class="relative flex items-center justify-center mt-6">
                        <div class="absolute w-full border-t border-gray-300"></div>
                        <div class="relative px-4 text-sm text-gray-500 bg-gray-50">Or continue with</div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-6">
                        <button type="button" class="flex items-center justify-center px-4 py-2 transition-colors duration-200 border border-gray-300 rounded-lg hover:bg-gray-50">
                            <i class="text-red-500 fab fa-google"></i>
                        </button>
                        <button type="button" class="flex items-center justify-center px-4 py-2 transition-colors duration-200 border border-gray-300 rounded-lg hover:bg-gray-50">
                            <i class="text-blue-600 fab fa-facebook-f"></i>
                        </button>
                        <button type="button" class="flex items-center justify-center px-4 py-2 transition-colors duration-200 border border-gray-300 rounded-lg hover:bg-gray-50">
                            <i class="text-gray-800 fab fa-apple"></i>
                        </button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Animate elements with GSAP
            gsap.from('.wave-animation', {
                y: 30,
                opacity: 0,
                duration: 1.5,
                ease: 'power3.out'
            });

            gsap.from('form > div', {
                y: 20,
                opacity: 0,
                stagger: 0.1,
                duration: 0.8,
                ease: 'power3.out',
                delay: 0.3
            });

            gsap.from('h2', {
                opacity: 0,
                y: -20,
                duration: 1,
                ease: 'back.out'
            });
        });
    </script>
</body>
</html>
