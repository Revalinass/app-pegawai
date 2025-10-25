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
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        georgia: ['Georgia', 'Times New Roman', 'serif'],
                    },
                    colors: {
                        softpink: '#FDECEF',
                        rose: '#F8BBD0',
                        blush: '#F48FB1',
                        darkpink: '#D81B60',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-softpink font-georgia min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-rose to-blush text-darkpink fixed inset-y-0 shadow-2xl flex flex-col">
        <!-- Header -->
        <div class="px-6 py-8 border-b border-white/30">
            <div class="flex items-center gap-3">
                <div class="bg-white/90 p-2 rounded-lg shadow-md">
                    <i data-lucide="users" class="w-6 h-6 text-darkpink"></i>
                </div>
                <h1 class="text-2xl font-bold tracking-wide">App Pegawai</h1>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-6 flex-grow px-3">
            <ul class="space-y-2">
                <li>
                    <a href="{{ url('/employees') }}" 
                       class="flex items-center gap-3 px-4 py-3 hover:bg-white/30 rounded-lg transition-all duration-200 group">
                        <i data-lucide="user-circle" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Employee</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/department') }}" 
                       class="flex items-center gap-3 px-4 py-3 hover:bg-white/30 rounded-lg transition-all duration-200 group">
                        <i data-lucide="building-2" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Department</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/attendance') }}" 
                       class="flex items-center gap-3 px-4 py-3 hover:bg-white/30 rounded-lg transition-all duration-200 group">
                        <i data-lucide="calendar-check" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/report') }}" 
                       class="flex items-center gap-3 px-4 py-3 hover:bg-white/30 rounded-lg transition-all duration-200 group">
                        <i data-lucide="file-text" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Report</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/settings') }}" 
                       class="flex items-center gap-3 px-4 py-3 hover:bg-white/30 rounded-lg transition-all duration-200 group">
                        <i data-lucide="settings" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Footer -->
        <footer class="px-6 py-5 text-sm text-center border-t border-white/30 bg-white/10">
            <div class="flex items-center justify-center gap-2 mb-1">
                <i data-lucide="heart" class="w-4 h-4"></i>
                <span class="font-medium">App Pegawai</span>
            </div>
            <p class="text-xs opacity-80">&copy; {{ date('Y') }} All Rights Reserved</p>
        </footer>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow ml-64 p-8">
        <!-- Content Card -->
        <div class="bg-white/80 backdrop-blur-lg shadow-xl rounded-2xl p-8 border-2 border-rose/50 hover:shadow-2xl transition-shadow duration-300">
            @yield('content')
        </div>
    </main>

    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>

</body>
</html>