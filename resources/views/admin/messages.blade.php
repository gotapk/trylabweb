@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
<header class="header">
    <div>
        <h1>Contact Messages</h1>
        <p style="color: var(--text-secondary);">Read and manage what users are leaving in the contact forms.</p>
    </div>
</header>

<div class="data-table-container fade-in">
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Sender</th>
                <th>Message Snippet</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr>
                <td>{{ $message->created_at->format('M d, Y') }}</td>
                <td>
                    <div style="font-weight: 600;">{{ $message->name }}</div>
                    <div style="font-size: 0.8rem; color: var(--text-secondary);">{{ $message->email }}</div>
                </td>
                <td style="color: var(--text-secondary); font-size: 0.85rem;">{{ Str::limit($message->message, 80) }}</td>
                <td>
                    <span style="background: {{ $message->status == 'unread' ? 'rgba(255, 51, 102, 0.1)' : 'rgba(0, 255, 136, 0.1)' }}; color: {{ $message->status == 'unread' ? 'var(--danger-color)' : 'var(--success-color)' }}; padding: 0.2rem 0.5rem; border-radius: 4px; font-size: 0.7rem;">
                        {{ ucfirst($message->status) }}
                    </span>
                </td>
                <td>
                    <button class="btn" style="background: #222; padding: 0.4rem 0.8rem; font-size: 0.8rem;">View</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div style="margin-top: 2rem;">
    {{ $messages->links() }}
</div>
@endsection
