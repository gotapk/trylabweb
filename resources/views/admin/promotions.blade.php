@extends('layouts.admin')

@section('title', 'Promotion Management')

@section('content')
<header class="header">
    <div>
        <h1>Promotion Management</h1>
        <p style="color: var(--text-secondary); font-family: var(--font-mono); font-size: 0.8rem;">[SYS.MODULE.PROM] // Registry of active marketing assets.</p>
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
                <th>Promotion Name</th>
                <th>Status</th>
                <th>Brief</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promotion)
            <tr>
                <td style="font-family: var(--font-mono); color: var(--accent-color);">#{{ sprintf('%02d', $promotion->order) }}</td>
                <td style="width: 80px;">
                    <div style="width: 60px; height: 60px; background-color: #000; border: 1px solid var(--border-color); overflow: hidden;">
                        @if($promotion->image_path)
                            @php
                                $imgSrc = (str_starts_with($promotion->image_path, 'img/')) 
                                    ? asset($promotion->image_path) 
                                    : asset('storage/' . $promotion->image_path);
                            @endphp
                            <img src="{{ $imgSrc }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://placehold.co/60x60/1a1a1a/ffffff?text=P'">
                        @else
                             <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #333;">[N/A]</div>
                        @endif
                    </div>
                </td>
                <td style="font-weight: 700; font-family: var(--font-mono);">{{ $promotion->name }}</td>
                <td>
                    @if($promotion->active)
                        <span style="border: 1px solid var(--success-color); color: var(--success-color); padding: 0.1rem 0.4rem; font-size: 0.65rem; font-family: var(--font-mono);">ACTIVE</span>
                    @else
                        <span style="border: 1px solid var(--danger-color); color: var(--danger-color); padding: 0.1rem 0.4rem; font-size: 0.65rem; font-family: var(--font-mono);">INACTIVE</span>
                    @endif
                </td>
                <td style="max-width: 300px; color: var(--text-secondary); font-size: 0.8rem; font-family: var(--font-main);">{{ Str::limit($promotion->description, 120) }}</td>
                <td>
                    <div style="display: flex; gap: 0.5rem;">
                        <button class="btn" style="padding: 0.4rem 0.8rem; font-size: 0.7rem;" 
                                onclick='editPromotion(@json($promotion))'>Edit</button>
                        <form action="{{ route('admin.promotions.delete', $promotion->id) }}" method="POST" onsubmit="return confirm('Terminate record?')">
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
        <div style="position: absolute; top: 10px; right: 10px; font-family: var(--font-mono); color: var(--accent-color); font-size: 0.6rem;">[PROMO_ADD_INIT]</div>
        <h2 style="margin-bottom: 2.5rem; font-family: var(--font-mono); text-transform: uppercase;">Initialize Promotion</h2>
        <form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Promotion Name</label>
                <input type="text" name="name" required placeholder="PROMO_ID">
            </div>
            <div class="form-group">
                <label>Category / Tag</label>
                <input type="text" name="category" placeholder="PROMO_TAG">
            </div>
            <div class="form-group">
                <label>External Link (URL)</label>
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
            <div class="form-group" style="display: flex; align-items: center; gap: 10px; margin-bottom: 2rem;">
                <input type="checkbox" name="active" id="active" checked style="width: auto;">
                <label for="active" style="margin-bottom: 0;">Mark as Active</label>
            </div>
            <div class="form-group">
                <label>Promotion Details</label>
                <textarea name="description" rows="5" placeholder="Synthesize promotion data..."></textarea>
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
        <div style="position: absolute; top: 10px; right: 10px; font-family: var(--font-mono); color: var(--accent-color); font-size: 0.6rem;">[PROMO_MOD_INIT]</div>
        <h2 style="margin-bottom: 2.5rem; font-family: var(--font-mono); text-transform: uppercase;">Modify Promotion</h2>
        <form id="editPromotionForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Promotion Name</label>
                <input type="text" name="name" id="edit-name" required>
            </div>
            <div class="form-group">
                <label>Category / Tag</label>
                <input type="text" name="category" id="edit-category">
            </div>
            <div class="form-group">
                <label>External Link</label>
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
            <div class="form-group" style="display: flex; align-items: center; gap: 10px; margin-bottom: 2rem;">
                <input type="checkbox" name="active" id="edit-active" style="width: auto;">
                <label for="edit-active" style="margin-bottom: 0;">Active</label>
            </div>
            <div class="form-group">
                <label>Promotion Details</label>
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
    function editPromotion(promotion) {
        document.getElementById('editPromotionForm').action = "{{ route('admin.promotions.update', ':id') }}".replace(':id', promotion.id);
        document.getElementById('edit-name').value = promotion.name;
        document.getElementById('edit-category').value = promotion.category || '';
        document.getElementById('edit-description').value = promotion.description || '';
        document.getElementById('edit-link').value = promotion.link || '';
        document.getElementById('edit-order').value = promotion.order || 0;
        document.getElementById('edit-active').checked = promotion.active;
        document.getElementById('current_image_path').textContent = 'Current: ' + (promotion.image_path || 'None');
        document.getElementById('edit-modal').style.display = 'flex';
    }
</script>
@endsection
@endsection
