<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Management System</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }
        .animate-float-slow {
            animation: float-slow 8s ease-in-out infinite;
        }
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.1); }
        }
        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-slide-in {
            animation: slideInLeft 0.8s ease-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-pink-50 via-white to-rose-50 min-h-screen font-sans antialiased overflow-x-hidden">
    
    <!-- Navigation Header -->
    <header class="w-full py-6 px-6 lg:px-8 relative z-20">
        <nav class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Auth Buttons -->
            <div class="flex items-center gap-3">
                <a href="/login" 
                   class="px-5 py-2.5 text-gray-700 hover:text-pink-600 font-semibold transition-colors duration-200">
                    Login
                </a>
                <a href="/register" 
                   class="px-6 py-2.5 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 font-semibold">
                    Register
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 lg:px-8 py-12 lg:py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Content -->
            <div class="space-y-8 animate-slide-in">
                
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-pink-100 to-rose-100 text-pink-600 rounded-full text-sm font-bold shadow-md">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                    </svg>
                    Modern & Praktis
                </div>
                
                <!-- Hero Title -->
                <div>
                    <h1 class="text-5xl lg:text-7xl font-bold text-gray-900 leading-tight mb-6">
                        Employee
                        <br>
                        <span class="bg-gradient-to-r from-pink-500 via-rose-500 to-pink-600 bg-clip-text text-transparent">
                            Management
                        </span>
                        <br>
                        System
                    </h1>
                    
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Kelola data pegawai dengan mudah dan efisien. Sistem terintegrasi untuk manajemen karyawan yang lebih baik.
                    </p>
                </div>          
            </div>


            <!-- Right Content - Illustration -->
            <div class="relative">
                <!-- Main Illustration Card -->
                <div class="relative z-10 animate-float-slow">
                    <!-- Large Card -->
                    <div class="bg-white rounded-3xl shadow-2xl p-8 space-y-6">
                        
                        <!-- Header -->
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-900">Dashboard Overview</h3>
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        </div>

                        <!-- Stats Grid -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl p-6 transform hover:scale-105 transition-transform duration-200">
                                <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center mb-3 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                <p class="text-3xl font-bold text-gray-900">50</p>
                                <p class="text-sm text-gray-600 mt-1">Total Staff</p>
                            </div>

                            <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-2xl p-6 transform hover:scale-105 transition-transform duration-200">
                                <div class="w-12 h-12 bg-gradient-to-br from-rose-400 to-rose-600 rounded-xl flex items-center justify-center mb-3 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <p class="text-3xl font-bold text-gray-900">98%</p>
                                <p class="text-sm text-gray-600 mt-1">Attendance</p>
                            </div>
                        </div>

                        <!-- Progress Bars -->
                        <div class="space-y-4 pt-4">
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="font-semibold text-gray-700">Team Performance</span>
                                    <span class="text-pink-600 font-bold">85%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                    <div class="bg-gradient-to-r from-pink-500 to-rose-500 h-3 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="font-semibold text-gray-700">Project Completion</span>
                                    <span class="text-rose-600 font-bold">92%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                    <div class="bg-gradient-to-r from-rose-500 to-pink-500 h-3 rounded-full" style="width: 92%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- User Avatars -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex -space-x-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-400 to-pink-600 border-2 border-white shadow-md"></div>
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-rose-400 to-rose-600 border-2 border-white shadow-md"></div>
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-300 to-pink-500 border-2 border-white shadow-md"></div>
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-rose-300 to-rose-500 border-2 border-white shadow-md"></div>
                            </div>
                            <button class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all duration-200">
                                View All
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Floating Elements -->
                <div class="absolute -top-8 -right-8 w-32 h-32 bg-gradient-to-br from-pink-300 to-pink-400 rounded-3xl opacity-60 blur-2xl animate-pulse-glow"></div>
                <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-gradient-to-br from-rose-300 to-rose-400 rounded-3xl opacity-60 blur-2xl animate-pulse-glow" style="animation-delay: 1.5s;"></div>
                
                <!-- Small Floating Cards -->
                <div class="absolute -left-4 top-20 bg-white rounded-2xl shadow-xl p-4 animate-float" style="animation-delay: 0.5s;">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Tasks Done</p>
                            <p class="text-lg font-bold text-gray-900">124</p>
                        </div>
                    </div>
                </div>

                <div class="absolute -right-4 bottom-32 bg-white rounded-2xl shadow-xl p-4 animate-float" style="animation-delay: 1s;">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Growth</p>
                            <p class="text-lg font-bold text-gray-900">+24%</p>
                        </div>
                    </div>
                </div>
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