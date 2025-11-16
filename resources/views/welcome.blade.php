<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Management System</title>
    
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
        @if (Route::has('login'))
            <nav class="max-w-7xl mx-auto flex items-center justify-between">
                <!-- Logo/Brand -->
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800">EMS</span>
                </div>

                <!-- Auth Links -->
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                           class="px-5 py-2.5 text-gray-700 hover:text-pink-600 font-medium transition-colors">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="px-5 py-2.5 text-gray-700 hover:text-pink-600 font-medium transition-colors">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="px-6 py-2.5 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-lg hover:shadow-lg transform hover:-translate-y-0.5 transition-all font-medium">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 lg:px-8 py-12 lg:py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Content -->
            <div class="space-y-8">
                <!-- Hero Title -->
                <div class="space-y-4">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-pink-100 text-pink-600 rounded-full text-sm font-semibold">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                        </svg>
                        Modern & Praktis
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Employee Management
                        <span class="bg-gradient-to-r from-pink-500 to-rose-500 bg-clip-text text-transparent">
                            System
                        </span>
                    </h1>
                    
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Kelola data pegawai dengan mudah dan efisien. Sistem terintegrasi untuk manajemen karyawan yang lebih baik.
                    </p>
                </div>

                <!-- Features List -->
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-lg">Data Management</h3>
                            <p class="text-gray-600">Kelola data pegawai dengan sistem yang terorganisir dan mudah diakses</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-lg">Fast & Secure</h3>
                            <p class="text-gray-600">Akses cepat dengan keamanan data yang terjamin</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-lg">Analytics & Reports</h3>
                            <p class="text-gray-600">Laporan dan statistik lengkap untuk keputusan yang lebih baik</p>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4 pt-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" 
                               class="px-8 py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl hover:shadow-xl transform hover:-translate-y-1 transition-all font-semibold text-lg">
                                Go to Dashboard
                            </a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" 
                                   class="px-8 py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl hover:shadow-xl transform hover:-translate-y-1 transition-all font-semibold text-lg">
                                    Get Started
                                </a>
                            @endif
                            <a href="{{ route('login') }}" 
                               class="px-8 py-4 bg-white text-gray-700 rounded-xl border-2 border-gray-200 hover:border-pink-500 hover:text-pink-600 transition-all font-semibold text-lg">
                                Sign In
                            </a>
                        @endauth
                    @endif
                </div>
            </div>

            <!-- Right Content - Illustration -->
            <div class="relative">
                <!-- Decorative Background -->
                <div class="absolute inset-0 bg-gradient-to-br from-pink-200 to-rose-200 rounded-3xl transform rotate-6 scale-95 opacity-20"></div>
                
                <!-- Main Card -->
                <div class="relative bg-white rounded-3xl shadow-2xl p-8 space-y-6">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-xl p-5">
                            <div class="flex items-center justify-between mb-2">
                                <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <p class="text-3xl font-bold text-gray-900">50+</p>
                            <p class="text-sm text-gray-600 mt-1">Total Employees</p>
                        </div>

                        <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-xl p-5">
                            <div class="flex items-center justify-between mb-2">
                                <svg class="w-8 h-8 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <p class="text-3xl font-bold text-gray-900">5</p>
                            <p class="text-sm text-gray-600 mt-1">Departments</p>
                        </div>
                    </div>

                    <!-- Feature List -->
                    <div class="space-y-3 pt-4">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                            <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
                            <span class="text-gray-700">Real-time Data Updates</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                            <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                            <span class="text-gray-700">Advanced Search & Filter</span>
                        </div>
                    </div>

                    <!-- Bottom Info -->
                    <div class="pt-4 border-t border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="flex -space-x-2">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-400 to-pink-600 border-2 border-white"></div>
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-rose-400 to-rose-600 border-2 border-white"></div>
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-300 to-pink-500 border-2 border-white"></div>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">Trusted by 100+ companies</p>
                                <p class="text-xs text-gray-500">Join them today!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Floating Elements -->
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-pink-200 rounded-full blur-2xl opacity-60 animate-pulse"></div>
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-rose-200 rounded-full blur-2xl opacity-60 animate-pulse delay-1000"></div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="max-w-7xl mx-auto px-6 lg:px-8 py-8 mt-20">
        <div class="border-t border-gray-200 pt-8 text-center">
            <p class="text-gray-600">© 2025 Employee Management System. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>