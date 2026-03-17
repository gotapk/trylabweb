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
                    <button class="btn btn-view" 
                        data-message='@json($message)'
                        style="background: #222; padding: 0.4rem 0.8rem; font-size: 0.8rem;">View</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Laboratory Message Viewer Modal -->
<div id="messageModal" class="modal-overlay">
    <div class="modal-content fade-in">
        <div class="modal-header">
            <span>[SUBJECT_FRAGMENT] // <span id="modal-date">DATE</span></span>
            <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="scanline"></div>
            
            <div class="lab-meta">
                <div class="meta-field">
                    <div class="meta-label">ID_NAME</div>
                    <div id="modal-name" class="meta-value">-</div>
                </div>
                <div class="meta-field">
                    <div class="meta-label">SOURCE_ID</div>
                    <div id="modal-type" class="meta-value">-</div>
                </div>
                <div class="meta-field">
                    <div class="meta-label">CONTACT_CH</div>
                    <div id="modal-email" class="meta-value">-</div>
                </div>
                <div class="meta-field">
                    <div class="meta-label">COMMS_EXT</div>
                    <div id="modal-phone" class="meta-value">-</div>
                </div>
            </div>

            <div id="diagnostic-results" style="margin-bottom: 2rem; display: none;">
                <div class="meta-label" style="margin-bottom: 1rem;">DIAGNOSTIC_ANALYSIS</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <div id="diag-web-field">Sitio Lento: <span class="diag-badge">?</span></div>
                    <div id="diag-brand-field">Marca Antigua: <span class="diag-badge">?</span></div>
                    <div id="diag-media-field">Contenido Visual: <span class="diag-badge">?</span></div>
                    <div id="diag-startup-field">Idea Negocio: <span class="diag-badge">?</span></div>
                </div>
            </div>

            <div id="services-grid" style="margin-bottom: 2rem; display: none;">
                <div class="meta-label">REQUISITION_SERVICES</div>
                <div id="modal-services" class="meta-value" style="font-size: 0.8rem; margin-top: 0.5rem;">-</div>
            </div>

            <div class="meta-label">CORE_MESSAGE_DATA</div>
            <div class="lab-message-box">
                <div id="modal-message">-</div>
            </div>

            <div id="attachment-field" style="margin-top: 2rem; display: none;">
                <div class="meta-label">EVIDENCE_FILE</div>
                <a id="modal-attachment" href="#" target="_blank" class="btn" style="margin-top: 0.5rem; display: inline-block;">Download Attachment</a>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 2rem;">
    {{ $messages->links() }}
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('messageModal');
    const closeBtn = document.querySelector('.close-modal');
    const viewBtns = document.querySelectorAll('.btn-view');

    viewBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const data = JSON.parse(btn.getAttribute('data-message'));
            
            // Populate Modal
            document.getElementById('modal-date').textContent = new Date(data.created_at).toLocaleDateString();
            document.getElementById('modal-name').textContent = data.name;
            document.getElementById('modal-email').textContent = data.email;
            document.getElementById('modal-phone').textContent = data.phone || 'N/A';
            document.getElementById('modal-type').textContent = data.form_type.toUpperCase();
            document.getElementById('modal-message').textContent = data.message || '(No detailed message provided)';

            // Handle Services
            const servicesCont = document.getElementById('services-grid');
            if (data.services && data.services.length > 0) {
                servicesCont.style.display = 'block';
                document.getElementById('modal-services').textContent = data.services.join(' // ');
            } else {
                servicesCont.style.display = 'none';
            }

            // Handle Diagnostic
            const diagCont = document.getElementById('diagnostic-results');
            if (data.diag_web || data.diag_brand) {
                diagCont.style.display = 'block';
                updateDiagField('diag-web-field', data.diag_web);
                updateDiagField('diag-brand-field', data.diag_brand);
                updateDiagField('diag-media-field', data.diag_media);
                updateDiagField('diag-startup-field', data.diag_startup);
            } else {
                diagCont.style.display = 'none';
            }

            // Handle Attachment
            const attachCont = document.getElementById('attachment-field');
            if (data.attachment_path) {
                attachCont.style.display = 'block';
                document.getElementById('modal-attachment').href = '/storage/' + data.attachment_path;
            } else {
                attachCont.style.display = 'none';
            }

            modal.style.display = 'flex';

            // Mark as read via AJAX
            if (data.status === 'unread') {
                fetch(`/admin/messages/${data.id}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                }).then(res => {
                    if (res.ok) {
                        // Update UI status badge in the table
                        const row = btn.closest('tr');
                        const badge = row.querySelector('span');
                        badge.textContent = 'Read';
                        badge.style.background = 'rgba(0, 255, 136, 0.1)';
                        badge.style.color = 'var(--success-color)';
                    }
                });
            }
        });
    });

    function updateDiagField(id, value) {
        const field = document.getElementById(id);
        const badge = field.querySelector('.diag-badge');
        badge.textContent = value || 'N/A';
        badge.className = 'diag-badge ' + (value === 'Si' ? 'diag-yes' : (value === 'No' ? 'diag-no' : ''));
    }

    closeBtn.addEventListener('click', () => modal.style.display = 'none');
    window.addEventListener('click', (e) => { if (e.target == modal) modal.style.display = 'none'; });
});
</script>
@endsection
