@extends('layouts.admin')
@section('title', 'My Profile')
@section('page-title', 'My Profile')
@section('page-subtitle', 'Update your admin account information and password')

@section('content')
<div class="grid lg:grid-cols-3 gap-6">

  <!-- ── Profile Photo ────────────────────────────────────── -->
  <div class="card">
    <div class="card-header"><div class="font-semibold text-white"><i class="fas fa-camera mr-2 text-indigo-400"></i>Profile Photo</div></div>
    <div class="card-body text-center">
      <div style="position:relative;display:inline-block;margin-bottom:1.25rem">
        @if($user->photo)
        <img id="photoPrev" src="{{ asset('storage/'.$user->photo) }}"
          class="w-24 h-24 rounded-2xl object-cover mx-auto border-2" style="border-color:rgba(99,102,241,0.4)">
        @else
        <div id="photoPlaceholder" class="w-24 h-24 rounded-2xl mx-auto flex items-center justify-center"
          style="background:rgba(99,102,241,0.1);border:2px dashed rgba(99,102,241,0.3)">
          <i class="fas fa-user" style="font-size:2rem;color:rgba(99,102,241,0.4)"></i>
        </div>
        <img id="photoPrev" src="" class="w-24 h-24 rounded-2xl object-cover mx-auto border-2 hidden"
          style="border-color:rgba(99,102,241,0.4)">
        @endif
      </div>

      <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_action" value="photo">
        <input type="file" name="photo" accept="image/*" id="photoInput" class="hidden" onchange="prevPhoto(this)">
        @error('photo')<p class="text-red-400 text-xs mb-2">{{ $message }}</p>@enderror
        <button type="button" onclick="document.getElementById('photoInput').click()" class="btn btn-secondary btn-sm mb-2">
          <i class="fas fa-camera"></i> Choose Photo
        </button>
        <div id="photoActions" class="hidden mt-2">
          <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i> Upload</button>
        </div>
        <p class="text-xs text-gray-600 mt-2">JPG, PNG up to 2 MB</p>
      </form>
    </div>
  </div>

  <!-- ── Personal Information ──────────────────────────────── -->
  <div class="card lg:col-span-2">
    <div class="card-header"><div class="font-semibold text-white"><i class="fas fa-user-edit mr-2 text-indigo-400"></i>Personal Information</div></div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf
        <input type="hidden" name="_action" value="info">
        <div class="grid sm:grid-cols-2 gap-4 mb-5">
          <div>
            <label class="form-label">Full Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-input" required>
            @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="form-label">Email Address</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input" required>
            @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Info</button>
      </form>
    </div>
  </div>

  <!-- ── Change Password ───────────────────────────────────── -->
  <div class="card lg:col-span-3">
    <div class="card-header"><div class="font-semibold text-white"><i class="fas fa-lock mr-2 text-indigo-400"></i>Change Password</div></div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf
        <input type="hidden" name="_action" value="password">
        <div class="grid sm:grid-cols-3 gap-4 mb-5">
          <div>
            <label class="form-label">Current Password</label>
            <input type="password" name="current_password" class="form-input" required placeholder="••••••••">
            @error('current_password')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="form-label">New Password</label>
            <input type="password" name="password" id="newPass" class="form-input" required placeholder="Min 8 characters">
            @error('password')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="confirmPass" class="form-input" required placeholder="Repeat new password">
          </div>
        </div>
        <div id="pwMatch" style="font-size:0.8rem;margin-bottom:1rem;display:none"></div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-key"></i> Change Password</button>
      </form>
    </div>
  </div>

</div>

@push('scripts')
<script>
function prevPhoto(input) {
  if (input.files && input.files[0]) {
    const prev = document.getElementById('photoPrev');
    const ph   = document.getElementById('photoPlaceholder');
    prev.src   = URL.createObjectURL(input.files[0]);
    prev.classList.remove('hidden');
    if (ph) ph.style.display = 'none';
    document.getElementById('photoActions').classList.remove('hidden');
  }
}

// Password match indicator
const np = document.getElementById('newPass');
const cp = document.getElementById('confirmPass');
const pm = document.getElementById('pwMatch');
function checkMatch() {
  if (!cp.value) { pm.style.display = 'none'; return; }
  pm.style.display = 'block';
  if (np.value === cp.value) {
    pm.style.color = '#86efac';
    pm.innerHTML = '<i class="fas fa-check-circle mr-1"></i>Passwords match';
  } else {
    pm.style.color = '#fca5a5';
    pm.innerHTML = '<i class="fas fa-times-circle mr-1"></i>Passwords do not match';
  }
}
np.addEventListener('input', checkMatch);
cp.addEventListener('input', checkMatch);
</script>
@endpush
@endsection
