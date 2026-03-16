@extends('layouts.admin')

@section('title', 'Experiments')

@section('content')
<header class="header">
    <div>
        <h1>Experiments</h1>
        <p style="color: var(--text-secondary); font-family: var(--font-mono); font-size: 0.8rem;">[SYS.MODULE.EXP] // R&D creative node management.</p>
    </div>
    <button class="btn btn-primary" onclick="document.getElementById('add-modal').style.display='flex'">+ New Synthesis</button>
</header>

<div class="data-table-container fade-in">
    <table>
        <thead>
            <tr>
                <th>Synthesis Identity</th>
                <th>Domain</th>
                <th>Endpoint</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @forelse($experiments as $experiment)
            <tr>
                <td style="font-weight: 700; font-family: var(--font-mono);">{{ $experiment->name }}</td>
                <td><span style="border: 1px solid var(--accent-color); color: var(--accent-color); padding: 0.1rem 0.4rem; font-size: 0.65rem; font-family: var(--font-mono);">{{ strtoupper($experiment->category) }}</span></td>
                <td><a href="{{ $experiment->link }}" target="_blank" style="color: var(--accent-color); font-family: var(--font-mono); font-size: 0.75rem;">{{ Str::limit($experiment->link, 30) ?: '[N/A]' }}</a></td>
                <td>
                    <div style="display: flex; gap: 0.5rem;">
                        <button class="btn" style="padding: 0.4rem 0.8rem; font-size: 0.7rem;"
                                onclick='editExperiment(@json($experiment))'>Edit</button>
                        <form action="{{ route('admin.experiments.delete', $experiment->id) }}" method="POST" onsubmit="return confirm('Terminate record?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn" style="border-color: var(--danger-color); color: var(--danger-color); padding: 0.4rem 0.8rem; font-size: 0.7rem;">Del</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center; padding: 2rem; color: var(--text-secondary);">No experiments found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div id="add-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); z-index: 1000; justify-content: center; align-items: center; backdrop-filter: blur(10px);">
    <div style="background: #000; padding: 3rem; border: 1px solid var(--accent-color); width: 600px; position: relative;">
        <div style="position: absolute; top: 10px; right: 10px; font-family: var(--font-mono); color: var(--accent-color); font-size: 0.6rem;">[EXP_ADD_INIT]</div>
        <h2 style="margin-bottom: 2.5rem; font-family: var(--font-mono); text-transform: uppercase;">Initialize Synthesis</h2>
        <form action="{{ route('admin.experiments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Synthesis Identity</label>
                <input type="text" name="name" required placeholder="SYNTHESIS_ID">
            </div>
            <div class="form-group">
                <label>R&D Domain</label>
                <input type="text" name="category" placeholder="DOMAIN_CLASS">
            </div>
            <div class="form-group">
                <label>External Interface (Link)</label>
                <input type="text" name="link" placeholder="https://external.node">
            </div>
            <div class="form-group">
                <label>Asset Injection (Image)</label>
                <input type="file" name="image_file" accept="image/*">
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
    <div style="background: #000; padding: 3rem; border: 1px solid var(--accent-color); width: 600px; position: relative;">
        <div style="position: absolute; top: 10px; right: 10px; font-family: var(--font-mono); color: var(--accent-color); font-size: 0.6rem;">[EXP_MOD_INIT]</div>
        <h2 style="margin-bottom: 2.5rem; font-family: var(--font-mono); text-transform: uppercase;">Modify Synthesis</h2>
        <form id="editExperimentForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Synthesis Identity</label>
                <input type="text" name="name" id="edit-name" required>
            </div>
            <div class="form-group">
                <label>R&D Domain</label>
                <input type="text" name="category" id="edit-category">
            </div>
            <div class="form-group">
                <label>External Interface</label>
                <input type="text" name="link" id="edit-link">
            </div>
            <div class="form-group">
                <label>Asset Update</label>
                <input type="file" name="image_file" accept="image/*">
                <small id="current_exp_image_path" style="display: block; margin-top: 0.5rem; color: var(--text-secondary); font-family: var(--font-mono); font-size: 0.6rem; opacity: 0.5;"></small>
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2rem; border-top: 1px solid var(--border-color); padding-top: 2rem;">
                <button type="button" class="btn" style="border: none; color: var(--text-secondary);" onclick="document.getElementById('edit-modal').style.display='none'">[ABORT]</button>
                <button type="submit" class="btn btn-primary">Update Record</button>
            </div>
        </form>
    </div>
</div>

@section('scripts')
<script>
    function editExperiment(experiment) {
        document.getElementById('editExperimentForm').action = "{{ route('admin.experiments.update', ':id') }}".replace(':id', experiment.id);
        document.getElementById('edit-name').value = experiment.name;
        document.getElementById('edit-category').value = experiment.category || '';
        document.getElementById('edit-link').value = experiment.link || '';
        document.getElementById('current_exp_image_path').textContent = 'Actual: ' + (experiment.image_path ? experiment.image_path : 'No image uploaded');
        document.getElementById('edit-modal').style.display = 'flex';
    }
</script>
@endsection
@endsection
