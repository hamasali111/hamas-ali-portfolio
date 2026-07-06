@extends('layouts.admin')
@section('title', 'Testimonials')
@section('page-title', 'Testimonials')
@section('page-subtitle', 'Manage client reviews and feedback')

@section('content')
<div class="card">
  <div class="card-header" style="justify-content:space-between">
    <div class="font-semibold text-white">All Testimonials ({{ $testimonials->count() }})</div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Testimonial</a>
  </div>
  <div class="table-wrap">
    @if($testimonials->count())
    <table>
      <thead>
        <tr>
          <th>Client</th>
          <th>Review</th>
          <th>Rating</th>
          <th>Featured</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($testimonials as $t)
        <tr>
          <td>
            <div class="flex items-center gap-3">
              <img src="{{ $t->avatar_url }}" class="w-9 h-9 rounded-full object-cover" alt="">
              <div>
                <div class="font-medium text-gray-200">{{ $t->name }}</div>
                <div class="text-xs text-gray-500">{{ $t->role }}{{ $t->company ? ' @ '.$t->company : '' }}</div>
              </div>
            </div>
          </td>
          <td>
            <div class="text-sm text-gray-400" style="max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $t->content }}</div>
          </td>
          <td>
            <div style="color:#fbbf24;font-size:0.8rem">
              @for($i=0;$i<$t->rating;$i++)<i class="fas fa-star"></i>@endfor
            </div>
          </td>
          <td>
            @if($t->is_featured)
            <span class="badge badge-success">Shown</span>
            @else
            <span class="badge badge-muted">Hidden</span>
            @endif
          </td>
          <td>
            <div class="flex gap-2">
              <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
              <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete this testimonial?')">
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
      <i class="fas fa-star text-4xl mb-3"></i>
      <p>No testimonials yet. <a href="{{ route('admin.testimonials.create') }}" class="text-indigo-400">Add one →</a></p>
    </div>
    @endif
  </div>
</div>
@endsection
