@extends('layouts.admin')

@section('title', 'Project Management')

@section('content')
<header class="header">
    <div>
        <h1>Project Management</h1>
        <p style="color: var(--text-secondary); font-family: var(--font-mono); font-size: 0.8rem;">[SYS.MODULE.PRJ] // Active cataloging of 13 primary assets.</p>
    </div>
    <button class="btn btn-primary" onclick="document.getElementById('add-modal').style.display='flex'">+ New Entry</button>
</header>

@if ($errors->any())
    <div style="background-color: rgba(255, 68, 68, 0.1); border: 1px solid var(--danger-color); color: var(--danger-color); padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">
        <ul style="margin: 0; padding-left: 1.5rem;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="data-table-container fade-in">
    <table>
        <thead>
            <tr>
                <th>Order</th>
                <th>Preview</th>
                <th>Identity</th>
                <th>Protocol</th>
                <th>Brief</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td style="font-family: var(--font-mono); color: var(--accent-color);">#{{ sprintf('%02d', $project->order) }}</td>
                <td style="width: 80px;">
                    <div style="width: 60px; height: 60px; background-color: #000; border: 1px solid var(--border-color); overflow: hidden;">
                        @if($project->image_path)
                            @php
                                $imgSrc = (str_starts_with($project->image_path, 'img/')) 
                                    ? asset($project->image_path) 
                                    : asset('storage/' . $project->image_path);
                            @endphp
                            <img src="{{ $imgSrc }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://placehold.co/60x60/1a1a1a/ffffff?text=P'">
                        @else
                             <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #333;">[N/A]</div>
                        @endif
                    </div>
                </td>
                <td style="font-weight: 700; font-family: var(--font-mono);">{{ $project->name }}</td>
                <td><span style="border: 1px solid var(--accent-color); color: var(--accent-color); padding: 0.1rem 0.4rem; font-size: 0.65rem; font-family: var(--font-mono);">{{ strtoupper($project->category) }}</span></td>
                <td style="max-width: 300px; color: var(--text-secondary); font-size: 0.8rem; font-family: var(--font-main);">{{ Str::limit($project->description, 120) }}</td>
                <td>
                    <div style="display: flex; gap: 0.5rem;">
                        <button class="btn" style="padding: 0.4rem 0.8rem; font-size: 0.7rem;" 
                                onclick='editProject(@json($project))'>Edit</button>
                        <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" onsubmit="return confirm('Terminate record?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn" style="border-color: var(--danger-color); color: var(--danger-color); padding: 0.4rem 0.8rem; font-size: 0.7rem;">Del</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Simple Add Modal -->
<div id="add-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); z-index: 1000; justify-content: center; align-items: center; backdrop-filter: blur(10px);">
    <div style="background: #000; padding: 3rem; border: 1px solid var(--accent-color); width: 600px; max-height: 90vh; overflow-y: auto; position: relative; box-shadow: 0 0 30px rgba(0, 242, 255, 0.1);">
        <div style="position: absolute; top: 10px; right: 10px; font-family: var(--font-mono); color: var(--accent-color); font-size: 0.6rem;">[RECORD_ADD_INIT]</div>
        <h2 style="margin-bottom: 2.5rem; font-family: var(--font-mono); text-transform: uppercase;">Initialize Entry</h2>
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Entry Identity (Name)</label>
                <input type="text" name="name" required placeholder="PROTOCOL_NAME">
            </div>
            <div class="form-group">
                <label>Protocol Category</label>
                <input type="text" name="category" placeholder="SYSTEM_CLASS">
            </div>
            <div class="form-group">
                <label>External Interface (URL)</label>
                <input type="text" name="link" placeholder="https://external.node">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div class="form-group">
                    <label>Priority Index (Order)</label>
                    <input type="number" name="order" value="0">
                </div>
                <div class="form-group">
                    <label>Asset Injection (Image)</label>
                    <input type="file" name="image_file" accept="image/*">
                </div>
            </div>
            <div class="form-group">
                <label>Data Summary (Description)</label>
                <textarea name="description" rows="5" placeholder="Synthesize entry data..."></textarea>
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2rem; border-top: 1px solid var(--border-color); padding-top: 2rem;">
                <button type="button" class="btn" style="border: none; color: var(--text-secondary);" onclick="document.getElementById('add-modal').style.display='none'">[ABORT]</button>
                <button type="submit" class="btn btn-primary">Inject Record</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="edit-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); z-index: 1000; justify-content: center; align-items: center; backdrop-filter: blur(10px);">
    <div style="background: #000; padding: 3rem; border: 1px solid var(--accent-color); width: 600px; max-height: 90vh; overflow-y: auto; position: relative; box-shadow: 0 0 30px rgba(0, 242, 255, 0.1);">
        <div style="position: absolute; top: 10px; right: 10px; font-family: var(--font-mono); color: var(--accent-color); font-size: 0.6rem;">[RECORD_MOD_INIT]</div>
        <h2 style="margin-bottom: 2.5rem; font-family: var(--font-mono); text-transform: uppercase;">Modify Record</h2>
        <form id="editProjectForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Entry Identity</label>
                <input type="text" name="name" id="edit-name" required>
            </div>
            <div class="form-group">
                <label>Protocol Category</label>
                <input type="text" name="category" id="edit-category">
            </div>
            <div class="form-group">
                <label>External Interface</label>
                <input type="text" name="link" id="edit-link">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div class="form-group">
                    <label>Priority Index</label>
                    <input type="number" name="order" id="edit-order">
                </div>
                <div class="form-group">
                    <label>Asset Update</label>
                    <input type="file" name="image_file" accept="image/*">
                </div>
            </div>
            <div class="form-group">
                <label>Data Summary</label>
                <textarea name="description" id="edit-description" rows="5"></textarea>
            </div>
            <small id="current_image_path" style="display: block; margin-top: -1rem; margin-bottom: 2rem; color: var(--text-secondary); font-family: var(--font-mono); font-size: 0.6rem; opacity: 0.5;"></small>
            <div style="display: flex; justify-content: flex-end; gap: 1rem; border-top: 1px solid var(--border-color); padding-top: 2rem;">
                <button type="button" class="btn" style="border: none; color: var(--text-secondary);" onclick="document.getElementById('edit-modal').style.display='none'">[ABORT]</button>
                <button type="submit" class="btn btn-primary">Update Record</button>
            </div>
        </form>
    </div>
</div>

@section('scripts')
<script>
    function editProject(project) {
        document.getElementById('editProjectForm').action = "{{ route('admin.projects.update', ':id') }}".replace(':id', project.id);
        document.getElementById('edit-name').value = project.name;
        document.getElementById('edit-category').value = project.category || '';
        document.getElementById('edit-description').value = project.description || '';
        document.getElementById('edit-link').value = project.link || '';
        document.getElementById('edit-order').value = project.order || 0;
        document.getElementById('current_image_path').textContent = 'Current: ' + (project.image_path || 'None');
        document.getElementById('edit-modal').style.display = 'flex';
    }

    // Keep modals open if there are validation errors
    @if ($errors->any())
        // Detect which modal to open based on old input if possible, or just show errors
        // For now, errors are shown at the top of the content
    @endif
</script>
@endsection
@endsection
