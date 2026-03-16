<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Try Lab</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div class="sidebar">
        <div class="logo">TRY LAB.ADMIN</div>
        <ul class="nav-links">
            <li><a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">Overview</a></li>
            <li><a href="{{ route('admin.visits') }}" class="{{ request()->routeIs('admin.visits') ? 'active' : '' }}">Visitor Analytics</a></li>
            <li><a href="{{ route('admin.messages') }}" class="{{ request()->routeIs('admin.messages') ? 'active' : '' }}">Messages</a></li>
            <li style="margin-top: 2rem; color: var(--text-secondary); font-size: 0.75rem; text-transform: uppercase; margin-left: 1rem;">CMS Management</li>
            <li><a href="{{ route('admin.projects') }}" class="{{ request()->routeIs('admin.projects') ? 'active' : '' }}">Projects</a></li>
            <li><a href="{{ route('admin.experiments') }}" class="{{ request()->routeIs('admin.experiments') ? 'active' : '' }}">Experiments</a></li>
            <li><a href="{{ route('admin.translations') }}" class="{{ request()->routeIs('admin.translations') ? 'active' : '' }}">Translations</a></li>
        </ul>
    </div>

    <div class="main">
        @if(session('success'))
            <div class="stat-card" style="border-color: var(--success-color); color: var(--success-color); padding: 1.5rem; margin-bottom: 2rem; font-family: var(--font-mono); font-size: 0.8rem;">
                > {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>
