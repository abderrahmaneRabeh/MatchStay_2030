<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Cup 2030 Morocco - Register</title>
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
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23006233' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .password-strength-meter {
            height: 5px;
            border-radius: 3px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="min-h-screen font-sans bg-gray-50 bg-pattern" x-data="{
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
        <!-- Left Side - Registration Form -->
        <div class="flex items-center justify-center w-full p-8 lg:w-1/2">
            <div class="w-full max-w-md">
                <div class="mb-8 text-center">
                    <h2 class="mb-2 text-3xl font-bold text-gray-800">Create an Account</h2>
                    <p class="text-gray-600">Join us for World Cup 2030 in Morocco</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa fa-user text-morocco-green"></i>
                        </div>
                        <input id="name" type="text" name="name" required autofocus autocomplete="name" placeholder="Full Name"
                               class="w-full px-4 py-3 pl-10 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco-green focus:border-transparent" />
                    </div>
                    <div class="text-sm text-red-500"></div>

                    <!-- Email Address -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa fa-envelope text-morocco-green"></i>
                        </div>
                        <input id="email" type="email" name="email" required autocomplete="username" placeholder="Email Address"
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
                            autocomplete="new-password"
                            placeholder="Password"
                            x-model="password"
                            @input="checkPasswordStrength()"
                            class="w-full px-4 py-3 pl-10 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco-green focus:border-transparent" />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <button type="button" @click="showPassword = !showPassword" class="text-morocco-green focus:outline-none">
                                <i class="fa" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Password Strength Meter -->
                    <div class="w-full h-1 bg-gray-200 rounded-full">
                        <div class="password-strength-meter"
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
                    <div class="text-sm text-red-500"></div>

                    <!-- Confirm Password -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa fa-lock text-morocco-green"></i>
                        </div>
                        <input
                            id="password_confirmation"
                            :type="showPasswordConfirmation ? 'text' : 'password'"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm Password"
                            x-model="passwordConfirmation"
                            class="w-full px-4 py-3 pl-10 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco-green focus:border-transparent" />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <button type="button" @click="showPasswordConfirmation = !showPasswordConfirmation" class="text-morocco-green focus:outline-none">
                                <i class="fa" :class="showPasswordConfirmation ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-sm text-red-500"></div>

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
                            <input id="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded focus:ring-morocco-green text-morocco-green" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-gray-600">I agree to the <a href="#" class="text-morocco-green hover:underline">Terms of Service</a> and <a href="#" class="text-morocco-green hover:underline">Privacy Policy</a></label>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 font-medium text-white transition-transform duration-200 transform rounded-lg bg-morocco-green hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-morocco-green hover:scale-105">
                        Create Account
                    </button>

                    <div class="mt-6 text-center">
                        <span class="text-sm text-gray-600">Already have an account?</span>
                        <a href="{{ route('login') }}" class="ml-1 text-sm font-medium text-morocco-green hover:underline">Sign in</a>
                    </div>

                    <div class="relative flex items-center justify-center mt-6">
                        <div class="absolute w-full border-t border-gray-300"></div>
                        <div class="relative px-4 text-sm text-gray-500 bg-gray-50">Or register with</div>
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
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Side - Image & Animation -->
        <div class="relative hidden overflow-hidden lg:flex lg:w-1/2 bg-morocco-red">
            <div class="absolute inset-0 bg-morocco-red opacity-90"></div>
            <div class="relative z-10 flex flex-col items-center justify-center p-12 text-white">
                <div class="mb-8 float-animation">
                    <img style="height: 100px;width: 100px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Flag_of_Morocco.svg/1200px-Flag_of_Morocco.svg.png" alt="World Cup Trophy" class="object-contain" />
                </div>
                <h1 class="mb-4 text-4xl font-bold text-center">Join the Excitement</h1>
                <h2 class="mb-6 text-2xl text-center">World Cup 2030 Morocco</h2>
                <p class="max-w-lg mb-6 text-lg text-center">Create your account to book the perfect accommodation for your World Cup experience. Find apartments and houses close to the stadiums, beaches, and local attractions.</p>

                <div class="grid w-full max-w-md grid-cols-2 gap-4 mt-4">
                    <div class="p-4 rounded-lg bg-white/10 backdrop-blur-sm">
                        <div class="mb-1 text-2xl font-bold">10+</div>
                        <div class="text-sm">Host Cities</div>
                    </div>
                    <div class="p-4 rounded-lg bg-white/10 backdrop-blur-sm">
                        <div class="mb-1 text-2xl font-bold">1000+</div>
                        <div class="text-sm">Properties</div>
                    </div>
                    <div class="p-4 rounded-lg bg-white/10 backdrop-blur-sm">
                        <div class="mb-1 text-2xl font-bold">48</div>
                        <div class="text-sm">Teams</div>
                    </div>
                    <div class="p-4 rounded-lg bg-white/10 backdrop-blur-sm">
                        <div class="mb-1 text-2xl font-bold">1M+</div>
                        <div class="text-sm">Fans</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Animate elements with GSAP
            gsap.from('.float-animation', {
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

            gsap.from('.grid-cols-2 > div', {
                scale: 0.8,
                opacity: 0,
                stagger: 0.1,
                duration: 0.6,
                ease: 'back.out(1.7)',
                delay: 0.7
            });
        });
    </script>
</body>
</html>
