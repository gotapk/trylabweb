@extends('layouts.admin')

@section('title', 'Translations')

@section('content')
<header class="header">
    <div>
        <h1>Translations</h1>
        <p style="color: var(--text-secondary); font-family: var(--font-mono); font-size: 0.8rem;">[SYS.MODULE.I18N] // Multi-locale syntax management.</p>
    </div>
    <button class="btn btn-primary" onclick="document.getElementById('add-modal').style.display='flex'">+ New Syntax</button>
</header>

<div class="data-table-container fade-in">
    <table>
        <thead>
            <tr>
                <th>Syntax Key</th>
                <th>Locale</th>
                <th>Data Value</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach($translations as $translation)
            <tr>
                <td style="font-family: var(--font-mono); font-weight: 700; color: var(--accent-color);">{{ $translation->key }}</td>
                <td><span style="border: 1px solid #333; color: #777; padding: 0.1rem 0.4rem; font-size: 0.65rem; font-family: var(--font-mono);">{{ strtoupper($translation->locale) }}</span></td>
                <td style="color: var(--text-secondary); font-size: 0.8rem;">{{ Str::limit($translation->value, 100) }}</td>
                <td>
                    <div style="display: flex; gap: 0.5rem;">
                        <button class="btn" style="padding: 0.4rem 0.8rem; font-size: 0.7rem;"
                                onclick='editTranslation(@json($translation))'>Edit</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div id="add-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); z-index: 1000; justify-content: center; align-items: center; backdrop-filter: blur(10px);">
    <div style="background: #000; padding: 3rem; border: 1px solid var(--accent-color); width: 600px; position: relative;">
        <div style="position: absolute; top: 10px; right: 10px; font-family: var(--font-mono); color: var(--accent-color); font-size: 0.6rem;">[I18N_ADD_INIT]</div>
        <h2 style="margin-bottom: 2.5rem; font-family: var(--font-mono); text-transform: uppercase;">Initialize Syntax</h2>
        <form action="{{ route('admin.translations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Syntax Key</label>
                <input type="text" name="key" required placeholder="SYNTAX_ID">
            </div>
            <div class="form-group">
                <label>Locale Node</label>
                <select name="locale">
                    <option value="es">Castilian (ES)</option>
                    <option value="en">International (EN)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Data Value</label>
                <textarea name="value" rows="5" placeholder="Translated string..."></textarea>
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
        <div style="position: absolute; top: 10px; right: 10px; font-family: var(--font-mono); color: var(--accent-color); font-size: 0.6rem;">[I18N_MOD_INIT]</div>
        <h2 style="margin-bottom: 2.5rem; font-family: var(--font-mono); text-transform: uppercase;">Modify Syntax</h2>
        <form action="{{ route('admin.translations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Syntax Key</label>
                <input type="text" name="key" id="edit-key" readonly style="border-color: #333; color: #555; cursor: not-allowed;">
            </div>
            <div class="form-group">
                <label>Locale Node</label>
                <input type="text" name="locale" id="edit-locale" readonly style="border-color: #333; color: #555; cursor: not-allowed;">
            </div>
            <div class="form-group">
                <label>Data Value</label>
                <textarea name="value" id="edit-value" rows="5"></textarea>
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 1rem; border-top: 1px solid var(--border-color); padding-top: 2rem;">
                <button type="button" class="btn" style="border: none; color: var(--text-secondary);" onclick="document.getElementById('edit-modal').style.display='none'">[ABORT]</button>
                <button type="submit" class="btn btn-primary">Update Record</button>
            </div>
        </form>
    </div>
</div>

@section('scripts')
<script>
    function editTranslation(translation) {
        document.getElementById('edit-key').value = translation.key;
        document.getElementById('edit-locale').value = translation.locale;
        document.getElementById('edit-value').value = translation.value;
        document.getElementById('edit-modal').style.display = 'flex';
    }
</script>
@endsection
@endsection
