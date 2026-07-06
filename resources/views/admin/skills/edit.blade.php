@extends('layouts.admin')
@section('title', 'Edit Skill')
@section('page-title', 'Edit Skill')
@section('page-subtitle', 'Update skill information')

@section('content')
<div class="card" style="max-width:640px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">Edit: {{ $skill->name }}</div>
    <a href="{{ route('admin.skills.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.skills.update', $skill) }}">
      @csrf @method('PUT')
      <div class="grid sm:grid-cols-2 gap-5">
        <div class="sm:col-span-2">
          <label class="form-label">Skill Name *</label>
          <input type="text" name="name" value="{{ old('name', $skill->name) }}" class="form-input" required>
          @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="form-label">Category *</label>
          <input type="text" name="category" value="{{ old('category', $skill->category) }}" class="form-input" list="cats" required>
          <datalist id="cats"><option value="Frontend"><option value="Backend"><option value="Database"><option value="DevOps"><option value="Mobile"><option value="Design"></datalist>
        </div>
        <div>
          <label class="form-label">Level (1–100) *</label>
          <input type="number" name="level" value="{{ old('level', $skill->level) }}" min="1" max="100" class="form-input" required id="levelInput" oninput="document.getElementById('levelPrev').textContent=this.value+'%'">
          <div class="mt-2">
            <div style="height:6px;background:rgba(255,255,255,0.06);border-radius:50px;overflow:hidden">
              <div id="levelBar" style="height:100%;background:linear-gradient(90deg,#6366f1,#06b6d4);border-radius:50px;width:{{ $skill->level }}%;transition:width 0.2s"></div>
            </div>
            <span id="levelPrev" class="text-xs text-gray-500 mt-1 inline-block">{{ $skill->level }}%</span>
          </div>
        </div>
        <div>
          <label class="form-label">Icon (Font Awesome)</label>
          <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}" placeholder="fab fa-laravel" class="form-input">
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order) }}" class="form-input">
        </div>
        <div class="sm:col-span-2">
          <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $skill->is_featured) ? 'checked' : '' }} style="accent-color:#6366f1;width:16px;height:16px">
            <span class="text-sm text-gray-300">Show on portfolio (Featured)</span>
          </label>
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Skill</button>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
<script>
const inp = document.getElementById('levelInput');
const bar = document.getElementById('levelBar');
inp.addEventListener('input', () => bar.style.width = inp.value + '%');
</script>
@endsection
