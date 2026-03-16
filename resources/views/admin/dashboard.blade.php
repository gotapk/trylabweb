@extends('layouts.admin')

@section('title', 'Overview')

@section('content')
<header class="header">
    <div>
        <p style="color: var(--text-secondary);">Welcome, Admin</p>
        <h1>Dashboard Overview</h1>
    </div>
    <div class="date">{{ date('l, d M Y') }}</div>
</header>

<section class="stats-grid">
    <div class="stat-card fade-in">
        <div class="stat-label">Total Visits</div>
        <div class="stat-value">{{ number_format($stats['total_visits']) }}</div>
    </div>
    <div class="stat-card fade-in" style="animation-delay: 0.1s;">
        <div class="stat-label">Unique Visitors</div>
        <div class="stat-value">{{ number_format($stats['unique_visitors']) }}</div>
    </div>
    <div class="stat-card fade-in" style="animation-delay: 0.2s;">
        <div class="stat-label">Unread Messages</div>
        <div class="stat-value" style="color: var(--accent-color);">{{ $stats['unread_messages'] }}</div>
    </div>
</section>

<section class="fade-in" style="animation-delay: 0.3s; margin-top: 3rem;">
    <h2 style="margin-bottom: 1.5rem;">Device Breakdown</h2>
    <div class="data-table-container">
        <table>
            <thead>
                <tr>
                    <th>Device Type</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats['device_breakdown'] as $device)
                <tr>
                    <td style="text-transform: capitalize;">{{ $device->device_type }}</td>
                    <td>{{ $device->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<section class="fade-in" style="animation-delay: 0.4s; margin-top: 3rem;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2>Recent Visits</h2>
        <a href="{{ route('admin.visits') }}" style="color: var(--accent-color); font-size: 0.9rem; text-decoration: none;">View All</a>
    </div>
    <div class="data-table-container">
        <table>
            <thead>
                <tr>
                    <th>IP Address</th>
                    <th>Device</th>
                    <th>Platform</th>
                    <th>Browser</th>
                    <th>Page</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats['recent_visits'] as $visit)
                <tr>
                    <td>{{ $visit->ip_address }}</td>
                    <td style="text-transform: capitalize;">{{ $visit->device_type }}</td>
                    <td>{{ $visit->platform ?? 'Unknown' }}</td>
                    <td>{{ $visit->browser ?? 'Unknown' }}</td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $visit->page_visited }}</td>
                    <td>{{ $visit->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection

