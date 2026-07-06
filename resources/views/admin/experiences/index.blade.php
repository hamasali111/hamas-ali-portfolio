@extends('layouts.admin')
@section('title', 'Experience')
@section('page-title', 'Experience')
@section('page-subtitle', 'Manage your work history and education')

@section('content')
<div class="card">
  <div class="card-header" style="justify-content:space-between">
    <div class="font-semibold text-white">All Experiences ({{ $experiences->count() }})</div>
    <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Experience</a>
  </div>
  <div class="table-wrap">
    @if($experiences->count())
    <table>
      <thead>
        <tr>
          <th>Position / Degree</th>
          <th>Company / School</th>
          <th>Type</th>
          <th>Period</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($experiences as $exp)
        <tr>
          <td class="font-medium text-gray-200">{{ $exp->title }}</td>
          <td class="text-gray-400">{{ $exp->company }}</td>
          <td>
            @if($exp->type === 'work')
            <span class="badge badge-primary">💼 Work</span>
            @else
            <span class="badge badge-warning">🎓 Education</span>
            @endif
          </td>
          <td class="text-gray-400 text-sm">{{ $exp->date_range }}</td>
          <td>
            @if($exp->is_current)
            <span class="badge badge-success">Current</span>
            @else
            <span class="badge badge-muted">Past</span>
            @endif
          </td>
          <td>
            <div class="flex gap-2">
              <a href="{{ route('admin.experiences.edit', $exp) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
              <form method="POST" action="{{ route('admin.experiences.destroy', $exp) }}" onsubmit="return confirm('Delete this experience?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="text-center py-12 text-gray-600">
      <i class="fas fa-briefcase text-4xl mb-3"></i>
      <p>No experience added yet. <a href="{{ route('admin.experiences.create') }}" class="text-indigo-400">Add one →</a></p>
    </div>
    @endif
  </div>
</div>
@endsection
