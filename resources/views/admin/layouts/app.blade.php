<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Simple Admin Styles -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 220px;
            background: #111827;
            color: #fff;
        }
        .sidebar h2 {
            padding: 20px;
            margin: 0;
            text-align: center;
            background: #0f172a;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #cbd5f5;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #1e293b;
            color: #fff;
        }
        .content {
            flex: 1;
        }
        .topbar {
            background: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }
        .main {
            padding: 20px;
        }
        .logout-btn {
            background: #dc2626;
            color: #fff;
            border: none;
            padding: 8px 14px;
            cursor: pointer;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="wrapper">

    <!-- Sidebar -->
   <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.users') }}">Users</a>
    <a href="{{ route('admin.courses') }}">Courses</a>
        <a href="#">Settings</a>
    </div>


    <!-- Content -->
    <div class="content">
        <div class="topbar">
            <div>
                Welcome, {{ auth('admin')->user()->name ?? 'Admin' }}
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="main">
            @yield('content')
        </div>
    </div>

</div>

</body>
</html>
