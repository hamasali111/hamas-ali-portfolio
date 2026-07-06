@extends('layouts.admin')
@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')
<div class="card" style="max-width:760px">
  <div class="card-header">
    <div class="font-semibold text-white flex-1">Edit: {{ $project->name }}</div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="grid sm:grid-cols-2 gap-5">
        <div class="sm:col-span-2">
          <label class="form-label">Project Name *</label>
          <input type="text" name="name" value="{{ old('name', $project->name) }}" class="form-input" required>
        </div>
        <div>
          <label class="form-label">Category *</label>
          <input type="text" name="category" value="{{ old('category', $project->category) }}" class="form-input" list="cats" required>
          <datalist id="cats"><option value="Web"><option value="Mobile"><option value="Dashboard"><option value="API"><option value="Design"></datalist>
        </div>
        <div>
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" class="form-input">
        </div>

        <!-- Image Upload -->
        <div class="sm:col-span-2">
          <label class="form-label">Project Image</label>
          <div id="imageDropzone" onclick="document.getElementById('imageInput').click()" style="border:2px dashed rgba(99,102,241,0.3);border-radius:12px;padding:1.5rem;text-align:center;cursor:pointer;transition:all 0.2s">
            <img id="imagePreview" src="{{ $project->image_url }}" style="max-height:200px;border-radius:8px;margin:0 auto 0.5rem;display:block;object-fit:cover;max-width:100%">
            <div class="text-xs text-gray-500 mt-2">Click to replace image</div>
          </div>
          <input type="file" name="image" accept="image/*" id="imageInput" class="hidden" onchange="previewImage(this)">
        </div>

        <div>
          <label class="form-label">Live URL</label>
          <input type="url" name="url" value="{{ old('url', $project->url) }}" class="form-input">
        </div>
        <div>
          <label class="form-label">GitHub URL</label>
          <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="form-input">
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Technologies</label>
          <input type="text" name="technologies" value="{{ old('technologies', $project->technologies) }}" class="form-input">
          <p class="text-xs text-gray-600 mt-1">Comma-separated</p>
        </div>
        <div class="sm:col-span-2">
          <label class="form-label">Description *</label>
          <textarea name="description" rows="4" class="form-input resize-none" required>{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="sm:col-span-2">
          <label class="flex items-center gap-3 cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} style="accent-color:#6366f1;width:16px;height:16px">
            <span class="text-sm text-gray-300">⭐ Featured Project</span>
          </label>
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Project</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
<script>
function previewImage(input) {
  if (input.files && input.files[0]) {
    document.getElementById('imagePreview').src = URL.createObjectURL(input.files[0]);
  }
}
</script>
@endsection
