@extends('layouts.admin')
@section('title', 'Add Experience')
@section('page-title', 'Add Experience')
@section('page-subtitle', 'Add a new work or education entry')

@section('content')
<div class="card" style="max-width:720px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">New Experience</div>
    <a href="{{ route('admin.experiences.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.experiences.store') }}">
      @csrf
      <div class="grid sm:grid-cols-2 gap-5">
        <div>
          <label class="form-label">Job Title / Degree *</label>
          <input type="text" name="title" value="{{ old('title') }}" placeholder="Senior Developer / BSc Computer Science" class="form-input" required>
          @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="form-label">Company / Institution *</label>
          <input type="text" name="company" value="{{ old('company') }}" placeholder="Google / MIT" class="form-input" required>
          @error('company')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="form-label">Location</label>
          <input type="text" name="location" value="{{ old('location') }}" placeholder="Lahore, Pakistan" class="form-input">
        </div>
        <div>
          <label class="form-label">Type *</label>
          <select name="type" class="form-input" required>
            <option value="work" {{ old('type') === 'work' ? 'selected' : '' }}>💼 Work</option>
            <option value="education" {{ old('type') === 'education' ? 'selected' : '' }}>🎓 Education</option>
          </select>
        </div>
        <div>
          <label class="form-label">Start Date *</label>
          <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-input" required>
          @error('start_date')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div id="endDateWrap">
          <label class="form-label">End Date</label>
          <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-input" id="endDate">
          @error('end_date')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="form-input">
        </div>
        <div class="flex items-center">
          <label class="flex items-center gap-3 cursor-pointer mt-4">
            <input type="hidden" name="is_current" value="0">
            <input type="checkbox" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }} id="isCurrent" style="accent-color:#6366f1;width:16px;height:16px" onchange="toggleEndDate(this)">
            <span class="text-sm text-gray-300">Currently working here</span>
          </label>
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Description *</label>
          <textarea name="description" rows="4" placeholder="Describe your role, responsibilities, and achievements..." class="form-input resize-none" required>{{ old('description') }}</textarea>
          @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Experience</button>
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
