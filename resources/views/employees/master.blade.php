<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Alpine.js for Dark Mode -->
    <script src="https://unpkg.com/alpinejs" defer></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Times new roman', 'system-ui', 'sans-serif'],
                },
                colors: {
                    softpink: '#FFF0F3',
                    rose: '#FFB5C5',
                    blush: '#FFC9D9',
                    darkpink: '#FF8FAB',
                    accent: '#FF6B9D',
                    cream: '#FFF8FA',
                    peach: '#FFE5EC',
                    berry: '#FF69B4',
                }
            }
        }
    }
</script>

    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-slide-in {
            animation: slideIn 0.4s ease-out;
        }

        /* Dark Mode Extra Styling */
        .dark .bg-white { background-color: #1f1f1f !important; }
        .dark .text-gray-800 { color: #f0f0f0 !important; }
        .dark .text-gray-600 { color: #d0d0d0 !important; }
        .dark .border-gray-100, .dark .border-gray-200 { border-color: #444 !important; }
    </style>
</head>
<body x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
      x-init="dark ? document.documentElement.classList.add('dark') : ''"
      :class="{ 'dark': dark }"
      class="bg-softpink dark:bg-gray-900 dark:text-gray-100 font-sans antialiased">

    <!-- Sidebar -->
    <aside class="w-64 bg-white dark:bg-[#2a2a2a] fixed inset-y-0 left-0 shadow-2xl flex flex-col z-50 border-r-2 border-rose/10 dark:border-gray-700">
        
        <!-- Header -->
        <div class="p-5 border-b border-gray-100 dark:border-gray-700">
            <div class="flex items-center gap-3 mb-1">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-rose to-accent flex items-center justify-center shadow-lg">
                    <i data-lucide="briefcase" class="w-6 h-6 text-white stroke-[2.5]"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-800 dark:text-gray-100 leading-tight">App Pegawai</h1>
                    <p class="text-[10px] text-gray-500 dark:text-gray-300 font-medium">Employee Management System</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-grow px-3 py-4 overflow-y-auto">
            <div class="space-y-1">   
                <a href="{{ url('/departments') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 hover:bg-blush/5 text-gray-700 dark:text-gray-200 hover:text-blush group border border-transparent hover:border-blush/20">
                    <i data-lucide="layout-grid" class="w-5 h-5 text-blush/70"></i>
                    <span class="font-semibold text-[13px]">Departments</span>
                </a>
                
                <a href="{{ url('/positions') }}" 
                 class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 hover:bg-accent/5 text-gray-700 dark:text-gray-200 hover:text-accent group border border-transparent hover:border-accent/20">
                    <i data-lucide="badge" class="w-5 h-5 text-accent/70"></i>
                    <span class="font-semibold text-[13px]">Positions</span>
                </a>

                <a href="{{ url('/employees') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 hover:bg-rose/5 text-gray-700 dark:text-gray-200 hover:text-rose group border border-transparent hover:border-rose/20">
                    <i data-lucide="user-round" class="w-5 h-5 text-rose/70"></i>
                    <span class="font-semibold text-[13px]">Employees</span>
                </a>

                <a href="{{ url('/attendances') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 hover:bg-accent/5 text-gray-700 dark:text-gray-200 hover:text-accent group border border-transparent hover:border-accent/20">
                    <i data-lucide="clipboard-check" class="w-5 h-5 text-accent/70"></i>
                    <span class="font-semibold text-[13px]">Attendances</span>
                </a>

                <a href="{{ url('/salaries') }}" 
                  class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 hover:bg-accent/5 text-gray-700 dark:text-gray-200 hover:text-accent group border border-transparent hover:border-accent/20">
                    <i data-lucide="wallet" class="w-5 h-5 text-accent/70"></i>
                    <span class="font-semibold text-[13px]">Salaries</span>
                </a>

                <a href="{{ url('/leaves') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 hover:bg-accent/5 text-gray-700 dark:text-gray-200 hover:text-accent group border border-transparent hover:border-accent/20">
                 <i data-lucide="calendar-x" class="w-5 h-5 text-accent/70"></i>
                     <span class="font-semibold text-[13px]">Leaves</span>
                </a>
            </div>
        </nav>

        <!-- Footer User Profile -->
        <footer class="p-4 border-t border-gray-100">
            <div class="bg-gradient-to-br from-rose/10 via-blush/5 to-accent/10 rounded-xl p-3 border border-rose/20">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-rose via-blush to-accent flex items-center justify-center flex-shrink-0 shadow-md">
                        <span class="text-white font-bold text-xs">S</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-xs text-gray-800 truncate">Admin</p>
                        <p class="text-[10px] text-gray-500">Shasabilas</p>
                    </div>
                </div>
            </div>
            <p class="text-[10px] text-center text-gray-400 mt-3 font-medium">
                v1.0 &copy; {{ date('Y') }}
            </p>
        </footer>
    </aside>
    
    <!-- Main Content -->
    <main class="ml-64 min-h-screen flex flex-col">
        
        <!-- Top Bar -->
        <div class="bg-gradient-to-r from-white via-rose/5 to-blush/5 dark:from-[#1f1f1f] dark:via-[#2a2a2a] dark:to-[#2a2a2a] border-b-2 border-rose/10 dark:border-gray-700 px-6 py-4 sticky top-0 z-40 backdrop-blur-sm">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-1 h-8 bg-gradient-to-b from-rose to-accent rounded-full"></div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-xs text-gray-500 dark:text-gray-300 font-medium">@yield('page-subtitle', 'Manage your team effectively')</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-2">

                    <!-- Dark Mode Toggle Button -->
                    <button 
                        @click="dark = !dark; dark ? (document.documentElement.classList.add('dark'), localStorage.setItem('theme','dark')) : (document.documentElement.classList.remove('dark'), localStorage.setItem('theme','light'))"
                        class="p-2 rounded-lg hover:bg-rose/10 transition-all group">
                        <i x-show="!dark" data-lucide="moon" class="w-5 h-5 text-gray-600 group-hover:text-rose"></i>
                        <i x-show="dark" data-lucide="sun" class="w-5 h-5 text-yellow-400"></i>
                    </button>
                    
                    <div class="ml-2 w-9 h-9 rounded-full bg-gradient-to-br from-rose to-accent flex items-center justify-center cursor-pointer hover:scale-105 transition-transform shadow-md">
                        <span class="text-white font-bold text-xs">R</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 p-6">
            <div class="bg-white dark:bg-[#2a2a2a] rounded-xl shadow-lg border-2 border-gray-100 dark:border-gray-700 p-6 min-h-[calc(100vh-140px)] animate-slide-in">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white dark:bg-[#1f1f1f] border-t border-gray-200 dark:border-gray-700 px-6 py-4">
            <div class="flex items-center justify-between text-sm">
                <p class="text-gray-600 dark:text-gray-300">
                    <span class="font-semibold text-rose">App Pegawai</span> &copy; {{ date('Y') }} • All rights reserved
                </p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-500 dark:text-gray-300 hover:text-rose transition-colors font-medium">Help</a>
                    <a href="#" class="text-gray-500 dark:text-gray-300 hover:text-rose transition-colors font-medium">Privacy</a>
                </div>
            </div>
        </footer>
    </main>

    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>

</body>
</html>