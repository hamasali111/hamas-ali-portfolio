@extends('layouts.admin')
@section('title', 'Add Testimonial')
@section('page-title', 'Add Testimonial')

@section('content')
<div class="card" style="max-width:720px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">New Testimonial</div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="grid sm:grid-cols-2 gap-5">
        <div>
          <label class="form-label">Client Name *</label>
          <input type="text" name="name" value="{{ old('name') }}" class="form-input" required>
          @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="form-label">Role / Position *</label>
          <input type="text" name="role" value="{{ old('role') }}" placeholder="CEO, Manager..." class="form-input" required>
          @error('role')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="form-label">Company</label>
          <input type="text" name="company" value="{{ old('company') }}" class="form-input">
        </div>
        <div>
          <label class="form-label">Rating (1–5) *</label>
          <select name="rating" class="form-input" required>
            @for($i=5;$i>=1;$i--)
            <option value="{{ $i }}" {{ old('rating',5) == $i ? 'selected' : '' }}>{{ str_repeat('★', $i) }} ({{ $i }})</option>
            @endfor
          </select>
        </div>
        <div>
          <label class="form-label">Avatar Photo</label>
          <input type="file" name="avatar" accept="image/*" class="form-input" id="avatarInput" onchange="previewImg(this,'avatarPrev')">
          <img id="avatarPrev" src="" class="mt-2 w-16 h-16 rounded-full object-cover hidden">
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="form-input">
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Testimonial Content *</label>
          <textarea name="content" rows="4" placeholder="Write the client's review here..." class="form-input resize-none" required>{{ old('content') }}</textarea>
          @error('content')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="sm:col-span-2">
          <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured',1) ? 'checked' : '' }} style="accent-color:#6366f1;width:16px;height:16px">
            <span class="text-sm text-gray-300">Show on portfolio</span>
          </label>
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Testimonial</button>
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
    prev.classList.remove('hidden');
  }
}
</script>
@endsection
