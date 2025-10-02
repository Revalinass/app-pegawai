<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8">
    <title>@yield('title', 'App Pegawai')</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table thead {
        background: #db348dff; 
        color: #fff;
    }

    table th, table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    table tr:nth-child(even) {
        background: #f9f9f9; /* warna abu muda untuk baris genap */
    }

    table tr:hover {
        background: #f1f1f1; /* efek hover */
    }
</style>
<body>
    <header>
        <h1>@yield('page-title', 'App Pegawai')</h1>
        <nav>
    <ul>
        <li><a href="{{ url('/employee') }}">Employee</a></li>
        <li><a href="{{ url('/department') }}">Department</a></li>
        <li><a href="{{ url('/attendance') }}">Attendance</a></li>
        <li><a href="{{ url('/report') }}">Report</a></li>
        <li><a href="{{ url('/settings') }}">Settings</a></li>
</ul>
</nav>
</header>
<main>
@yield('content')
</main>
<footer>
<p>&copy; {{ date('Y') }} App Pegawai</p>
</footer>
</body>
</html>
