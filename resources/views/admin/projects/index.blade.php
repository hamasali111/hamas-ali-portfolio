@extends('layouts.admin')
@section('title', 'Projects')
@section('page-title', 'Projects')
@section('page-subtitle', 'Manage your portfolio projects with images')

@section('content')
<div class="card">
  <div class="card-header" style="justify-content:space-between">
    <div class="font-semibold text-white">All Projects ({{ $projects->count() }})</div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Project</a>
  </div>
  @if($projects->count())
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4" style="padding:1.5rem">
    @foreach($projects as $project)
    <div style="background:#080d1e;border:1px solid rgba(255,255,255,0.06);border-radius:14px;overflow:hidden">
      <div style="position:relative;height:160px;overflow:hidden">
        <img src="{{ $project->image_url }}" alt="{{ $project->name }}" style="width:100%;height:100%;object-fit:cover">
        <div style="position:absolute;top:8px;right:8px;display:flex;gap:6px">
          <span style="background:rgba(99,102,241,0.9);color:#fff;padding:3px 10px;border-radius:50px;font-size:0.7rem;font-weight:700">{{ $project->category }}</span>
          @if($project->is_featured)
          <span style="background:rgba(244,114,182,0.9);color:#fff;padding:3px 8px;border-radius:50px;font-size:0.7rem;font-weight:700">⭐</span>
          @endif
        </div>
      </div>
      <div style="padding:1rem">
        <div class="font-semibold text-gray-200 mb-1">{{ $project->name }}</div>
        <div class="text-xs text-gray-500 mb-3" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden">{{ $project->description }}</div>
        @if($project->technologies)
        <div style="font-size:0.7rem;color:#6366f1;margin-bottom:10px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $project->technologies }}</div>
        @endif
        <div class="flex gap-2">
          <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-secondary flex-1 justify-center"><i class="fas fa-edit"></i> Edit</a>
          <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Delete this project?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <div class="text-center py-12 text-gray-600" style="padding:3rem">
    <i class="fas fa-folder-open text-4xl mb-3"></i>
    <p>No projects yet. <a href="{{ route('admin.projects.create') }}" class="text-indigo-400">Add your first project →</a></p>
  </div>
  @endif
</div>
@endsection
