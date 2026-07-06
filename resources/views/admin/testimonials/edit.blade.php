@extends('layouts.admin')
@section('title', 'Edit Testimonial')
@section('page-title', 'Edit Testimonial')

@section('content')
<div class="card" style="max-width:720px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">Edit: {{ $testimonial->name }}</div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="grid sm:grid-cols-2 gap-5">
        <div>
          <label class="form-label">Client Name *</label>
          <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="form-input" required>
        </div>
        <div>
          <label class="form-label">Role *</label>
          <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" class="form-input" required>
        </div>
        <div>
          <label class="form-label">Company</label>
          <input type="text" name="company" value="{{ old('company', $testimonial->company) }}" class="form-input">
        </div>
        <div>
          <label class="form-label">Rating *</label>
          <select name="rating" class="form-input" required>
            @for($i=5;$i>=1;$i--)
            <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ str_repeat('★', $i) }} ({{ $i }})</option>
            @endfor
          </select>
        </div>
        <div>
          <label class="form-label">Avatar Photo</label>
          <input type="file" name="avatar" accept="image/*" class="form-input" onchange="previewImg(this,'avatarPrev')">
          <img id="avatarPrev" src="{{ $testimonial->avatar_url }}" class="mt-2 w-16 h-16 rounded-full object-cover">
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" class="form-input">
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Testimonial Content *</label>
          <textarea name="content" rows="4" class="form-input resize-none" required>{{ old('content', $testimonial->content) }}</textarea>
        </div>
        <div class="sm:col-span-2">
          <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }} style="accent-color:#6366f1;width:16px;height:16px">
            <span class="text-sm text-gray-300">Show on portfolio</span>
          </label>
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Testimonial</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
<script>
function previewImg(input, previewId) {
  const prev = document.getElementById(previewId);
  if (input.files && input.files[0]) {
    prev.src = URL.createObjectURL(input.files[0]);
  }
}
</script>
@endsection
