@extends('layouts.admin')

@section('title', 'Visitor Analytics')

@section('content')
<header class="header">
    <div>
        <h1>Visitor Analytics</h1>
        <p style="color: var(--text-secondary);">Detailed log of all site interactions.</p>
    </div>
</header>

<div class="data-table-container fade-in">
    <table>
        <thead>
            <tr>
                <th>Time</th>
                <th>IP Address</th>
                <th>Device</th>
                <th>Browser</th>
                <th>Platform</th>
                <th>Target Page</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visits as $visit)
            <tr>
                <td style="color: var(--text-secondary); font-size: 0.8rem;">{{ $visit->created_at->format('M d, H:i:s') }}</td>
                <td style="font-family: monospace; font-weight: 600;">{{ $visit->ip_address }}</td>
                <td>
                    <span style="padding: 0.2rem 0.5rem; border-radius: 4px; font-size: 0.7rem; background: {{ $visit->device_type == 'desktop' ? 'rgba(0, 242, 255, 0.1)' : 'rgba(0, 255, 136, 0.1)' }}; color: {{ $visit->device_type == 'desktop' ? 'var(--accent-color)' : 'var(--success-color)' }};">
                        {{ ucfirst($visit->device_type) }}
                    </span>
                </td>
                <td>{{ $visit->browser ?? 'Unknown' }}</td>
                <td>{{ $visit->platform ?? 'Unknown' }}</td>
                <td style="font-size: 0.8rem; color: var(--text-secondary);">{{ Str::after($visit->page_visited, request()->getHttpHost()) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div style="margin-top: 2rem;">
    {{ $visits->links() }}
</div>
@endsection
