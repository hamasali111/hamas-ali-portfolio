@extends('layouts.admin')
@section('title', 'Edit Experience')
@section('page-title', 'Edit Experience')
@section('page-subtitle', 'Update experience details')

@section('content')
<div class="card" style="max-width:720px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">Edit: {{ $experience->title }}</div>
    <a href="{{ route('admin.experiences.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.experiences.update', $experience) }}">
      @csrf @method('PUT')
      <div class="grid sm:grid-cols-2 gap-5">
        <div>
          <label class="form-label">Job Title / Degree *</label>
          <input type="text" name="title" value="{{ old('title', $experience->title) }}" class="form-input" required>
          @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="form-label">Company / Institution *</label>
          <input type="text" name="company" value="{{ old('company', $experience->company) }}" class="form-input" required>
        </div>
        <div>
          <label class="form-label">Location</label>
          <input type="text" name="location" value="{{ old('location', $experience->location) }}" class="form-input">
        </div>
        <div>
          <label class="form-label">Type *</label>
          <select name="type" class="form-input" required>
            <option value="work" {{ old('type', $experience->type) === 'work' ? 'selected' : '' }}>💼 Work</option>
            <option value="education" {{ old('type', $experience->type) === 'education' ? 'selected' : '' }}>🎓 Education</option>
          </select>
        </div>
        <div>
          <label class="form-label">Start Date *</label>
          <input type="date" name="start_date" value="{{ old('start_date', $experience->start_date?->format('Y-m-d')) }}" class="form-input" required>
        </div>
        <div id="endDateWrap" style="opacity:{{ $experience->is_current ? '0.4' : '1' }}">
          <label class="form-label">End Date</label>
          <input type="date" name="end_date" value="{{ old('end_date', $experience->end_date?->format('Y-m-d')) }}" class="form-input" id="endDate" {{ $experience->is_current ? 'disabled' : '' }}>
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', $experience->sort_order) }}" class="form-input">
        </div>
        <div class="flex items-center">
          <label class="flex items-center gap-3 cursor-pointer mt-4">
            <input type="hidden" name="is_current" value="0">
            <input type="checkbox" name="is_current" value="1" {{ old('is_current', $experience->is_current) ? 'checked' : '' }} id="isCurrent" style="accent-color:#6366f1;width:16px;height:16px" onchange="toggleEndDate(this)">
            <span class="text-sm text-gray-300">Currently working here</span>
          </label>
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Description *</label>
          <textarea name="description" rows="4" class="form-input resize-none" required>{{ old('description', $experience->description) }}</textarea>
          @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Experience</button>
        <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
<script>
function toggleEndDate(cb) {
  document.getElementById('endDate').disabled = cb.checked;
  document.getElementById('endDateWrap').style.opacity = cb.checked ? '0.4' : '1';
}
</script>
@endsection
