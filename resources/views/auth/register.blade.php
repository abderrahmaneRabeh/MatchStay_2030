<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Cup 2030 Morocco - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
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
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2334D399' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="min-h-screen font-sans bg-light bg-pattern" x-data="{
    password: '',
    passwordConfirmation: '',
    showPassword: false,
    showPasswordConfirmation: false,
    passwordStrength: 0,
    checkPasswordStrength() {
        let strength = 0;
        if (this.password.length >= 8) strength += 1;
        if (/[A-Z]/.test(this.password)) strength += 1;
        if (/[0-9]/.test(this.password)) strength += 1;
        if (/[^A-Za-z0-9]/.test(this.password)) strength += 1;
        this.passwordStrength = strength;
    }
}">
    <div class="flex min-h-screen">
        <!-- Left Side - Image & Animation -->
        <div class="relative hidden lg:flex lg:w-1/2 bg-primary">
            <div class="absolute inset-0 bg-primary opacity-90"></div>
            <div class="relative z-10 flex flex-col items-center justify-center p-12 text-white">
                <div class="mb-8">
                    <svg class="w-32 h-32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h1 class="mb-4 text-4xl font-bold text-center">World Cup 2030</h1>
                <h2 class="mb-6 text-2xl text-center">Morocco Rental Hub</h2>
                <p class="max-w-lg mb-6 text-lg text-center">Experience luxury accommodations for the 2030 World Cup in beautiful Morocco.</p>
            </div>
        </div>

        <!-- Right Side - Registration Form -->
        <div class="flex items-center justify-center w-full p-8 lg:w-1/2">
            <div class="w-full max-w-md">
                <div class="mb-10 text-center">
                    <h2 class="mb-2 text-3xl font-bold text-gray-800">Create an Account</h2>
                    <p class="text-gray-600">Join us for World Cup 2030 in Morocco</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div class="relative">
                        <input id="name" type="text" name="name" required autofocus autocomplete="name" placeholder="Full Name"
                               class="w-full px-4 py-3 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" />
                    </div>

                    <!-- Email Address -->
                    <div class="relative">
                        <input id="email" type="email" name="email" required autocomplete="username" placeholder="Email Address"
                               class="w-full px-4 py-3 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" />
                    </div>

                      <!-- Account Type Selection -->
                      <div class="relative">
                        <select id="account_type" name="account_type" required class="w-full px-4 py-3 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco-green focus:border-transparent">
                            <option value="" disabled selected>Select Account Type</option>
                            <option value="touriste">Touriste</option>
                            <option value="proprietaire">Propriétaire</option>
                        </select>
                    </div>
                    <div class="text-sm text-red-500"></div>

                    <!-- Password -->
                    <div class="relative">
                        <input
                            id="password"
                            :type="showPassword ? 'text' : 'password'"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Password"
                            x-model="password"
                            @input="checkPasswordStrength()"
                            class="w-full px-4 py-3 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" />
                        <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 focus:outline-none">
                            <svg class="w-5 h-5" :class="{'hidden': !showPassword, 'block': showPassword}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg class="w-5 h-5" :class="{'block': !showPassword, 'hidden': showPassword}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        </button>
                    </div>

                    <!-- Password Strength Meter -->
                    <div class="w-full h-1 bg-gray-200 rounded-full">
                        <div class="h-1 transition-all duration-300"
                             :class="{
                                'w-1/4 bg-red-500': passwordStrength == 1,
                                'w-2/4 bg-yellow-500': passwordStrength == 2,
                                'w-3/4 bg-blue-500': passwordStrength == 3,
                                'w-full bg-green-500': passwordStrength == 4,
                                'w-0': passwordStrength == 0
                             }"></div>
                    </div>
                    <div class="text-xs text-gray-500" x-show="password.length > 0">
                        <span x-show="passwordStrength == 0 || passwordStrength == 1">Weak password</span>
                        <span x-show="passwordStrength == 2">Fair password</span>
                        <span x-show="passwordStrength == 3">Good password</span>
                        <span x-show="passwordStrength == 4">Strong password</span>
                    </div>

                    <!-- Confirm Password -->
                    <div class="relative">
                        <input
                            id="password_confirmation"
                            :type="showPasswordConfirmation ? 'text' : 'password'"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm Password"
                            x-model="passwordConfirmation"
                            class="w-full px-4 py-3 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" />
                        <button type="button" @click="showPasswordConfirmation = !showPasswordConfirmation" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 focus:outline-none">
                            <svg class="w-5 h-5" :class="{'hidden': !showPasswordConfirmation, 'block': showPasswordConfirmation}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg class="w-5 h-5" :class="{'block': !showPasswordConfirmation, 'hidden': showPasswordConfirmation}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        </button>
                    </div>

                    <!-- Password Match Indicator -->
                    <div class="text-xs" x-show="password.length > 0 && passwordConfirmation.length > 0">
                        <span class="text-green-500" x-show="password === passwordConfirmation && password.length > 0">
                            <i class="mr-1 fa fa-check"></i>Passwords match
                        </span>
                        <span class="text-red-500" x-show="password !== passwordConfirmation && passwordConfirmation.length > 0">
                            <i class="mr-1 fa fa-times"></i>Passwords don't match
                        </span>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded focus:ring-primary text-primary" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-gray-600">I agree to the <a href="#" class="text-primary hover:underline">Terms of Service</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a></label>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 font-medium text-white transition-transform duration-200 transform rounded-lg bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary hover:scale-105">
                        Create Account
                    </button>

                    <div class="mt-6 text-center">
                        <span class="text-sm text-gray-600">Already have an account?</span>
                        <a href="{{ route('login') }}" class="ml-1 text-sm font-medium text-primary hover:underline">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.from('.mb-8', {
                y: 30,
                opacity: 0,
                duration: 1,
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
