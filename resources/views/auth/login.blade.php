<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Employee Management System</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-50 via-white to-rose-50 min-h-screen font-sans">
    
    <!-- Navigation Header -->
    <header class="w-full py-6 px-6 lg:px-8">
        <nav class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo/Brand
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </a>
             -->

            <!-- Register Link
            <div class="flex items-center gap-3">
                <span class="text-gray-600 text-sm">Belum punya akun?</span>
                <a href="{{ route('register') }}" 
                   class="px-6 py-2.5 bg-white border-2 border-gray-200 text-gray-700 rounded-lg hover:border-pink-500 hover:text-pink-600 transition-all font-medium">
                    Register
                </a>
            </div>
             -->

        </nav>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 lg:px-8 py-8 lg:py-12">
        <div class="max-w-md mx-auto">
            
            <!-- Login Card -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 space-y-8 relative overflow-hidden">
                
                <!-- Decorative Elements -->
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-pink-200 rounded-full blur-3xl opacity-30"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-rose-200 rounded-full blur-3xl opacity-30"></div>
                
                <div class="relative">
                    <!-- Header -->
                    <div class="text-center space-y-2 mb-8">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-pink-100 text-pink-600 rounded-full text-sm font-semibold mb-4">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            Welcome Back
                        </div>
                        
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">
                            Login to Continue
                        </h1>
                        <p class="text-gray-500">Masuk ke akun Anda untuk melanjutkan</p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-green-50 border-2 border-green-200 rounded-xl">
                            <p class="text-sm text-green-600 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                {{ session('status') }}
                            </p>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                </div>
                                <input id="email" 
                                       type="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autofocus 
                                       autocomplete="username"
                                       class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-pink-500 focus:ring-4 focus:ring-pink-100 transition-all outline-none @error('email') border-red-500 @enderror"
                                       placeholder="nama@email.com">
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input id="password" 
                                       type="password" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-pink-500 focus:ring-4 focus:ring-pink-100 transition-all outline-none @error('password') border-red-500 @enderror"
                                       placeholder="••••••••">
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 cursor-pointer group">
                                <input type="checkbox" 
                                       name="remember" 
                                       class="w-4 h-4 text-pink-600 border-2 border-gray-300 rounded focus:ring-2 focus:ring-pink-100 cursor-pointer">
                                <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">
                                    Remember me
                                </span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                   class="text-sm text-pink-600 hover:text-pink-700 font-semibold">
                                    Lupa Password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl hover:shadow-xl transform hover:-translate-y-0.5 transition-all font-semibold text-lg">
                            Login
                        </button>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">Atau</span>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="text-gray-600">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" 
                                   class="text-pink-600 hover:text-pink-700 font-semibold">
                                    Daftar sekarang
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Trust Indicators -->
            <div class="mt-8 text-center space-y-4">
                <div class="flex items-center justify-center gap-6 text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Secure Login
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        Data Protected
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="max-w-7xl mx-auto px-6 lg:px-8 py-8 mt-12">
        <div class="border-t border-gray-200 pt-8 text-center">
            <p class="text-gray-600">© 2025 Employee Management System. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>