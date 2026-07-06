@extends('layouts.admin')
@section('title', 'Site Settings')
@section('page-title', 'Site Settings')
@section('page-subtitle', 'Update your portfolio personal information and links')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
  @csrf
  <div class="grid lg:grid-cols-3 gap-6">

    <!-- Profile Photo -->
    <div class="card">
      <div class="card-header"><div class="font-semibold text-white">Profile Photo</div></div>
      <div class="card-body text-center">
        <div style="position:relative;display:inline-block;margin-bottom:1rem">
          @if($settings->get('photo'))
          <img id="photoPrev" src="{{ asset('storage/'.$settings->get('photo')) }}" class="w-32 h-32 rounded-2xl object-cover mx-auto border-2" style="border-color:rgba(99,102,241,0.3)">
          @else
          <div id="photoPlaceholder" class="w-32 h-32 rounded-2xl mx-auto flex items-center justify-center" style="background:rgba(99,102,241,0.1);border:2px dashed rgba(99,102,241,0.3)">
            <i class="fas fa-user" style="font-size:2.5rem;color:rgba(99,102,241,0.4)"></i>
          </div>
          <img id="photoPrev" src="" class="w-32 h-32 rounded-2xl object-cover mx-auto border-2 hidden" style="border-color:rgba(99,102,241,0.3)">
          @endif
        </div>
        <input type="file" name="photo" accept="image/*" id="photoInput" class="hidden" onchange="prevPhoto(this)">
        <button type="button" onclick="document.getElementById('photoInput').click()" class="btn btn-secondary btn-sm"><i class="fas fa-camera"></i> Change Photo</button>
        <p class="text-xs text-gray-600 mt-2">JPG, PNG up to 3MB</p>
      </div>
    </div>

    <!-- Resume -->
    <div class="card">
      <div class="card-header"><div class="font-semibold text-white">Resume / CV</div></div>
      <div class="card-body text-center">
        @if($settings->get('resume'))
        <div style="background:rgba(99,102,241,0.05);border:1px solid rgba(99,102,241,0.15);border-radius:12px;padding:1rem;margin-bottom:1rem">
          <i class="fas fa-file-pdf" style="color:#f87171;font-size:2rem;margin-bottom:8px"></i>
          <div class="text-sm text-gray-400">Resume uploaded</div>
          <a href="{{ asset('storage/'.$settings->get('resume')) }}" target="_blank" class="text-indigo-400 text-xs hover:text-indigo-300">View current →</a>
        </div>
        @else
        <div style="background:rgba(255,255,255,0.02);border:2px dashed rgba(255,255,255,0.08);border-radius:12px;padding:1.5rem;margin-bottom:1rem">
          <i class="fas fa-file-upload" style="font-size:2rem;color:#475569;margin-bottom:8px"></i>
          <div class="text-sm text-gray-500">No resume uploaded</div>
        </div>
        @endif
        <input type="file" name="resume" accept=".pdf" id="resumeInput" class="hidden">
        <button type="button" onclick="document.getElementById('resumeInput').click()" class="btn btn-secondary btn-sm"><i class="fas fa-upload"></i> Upload PDF</button>
        <p class="text-xs text-gray-600 mt-2">PDF only, max 5MB</p>
      </div>
    </div>

    <!-- Stats -->
    <div class="card">
      <div class="card-header"><div class="font-semibold text-white">Portfolio Stats</div></div>
      <div class="card-body">
        <div class="mb-4">
          <label class="form-label">Years of Experience</label>
          <input type="number" name="years_exp" value="{{ old('years_exp', $settings->get('years_exp', 3)) }}" min="0" class="form-input">
        </div>
        <div class="mb-4">
          <label class="form-label">Projects Completed</label>
          <input type="number" name="projects_done" value="{{ old('projects_done', $settings->get('projects_done', 25)) }}" min="0" class="form-input">
        </div>
        <div>
          <label class="form-label">Happy Clients</label>
          <input type="number" name="clients_done" value="{{ old('clients_done', $settings->get('clients_done', 15)) }}" min="0" class="form-input">
        </div>
      </div>
    </div>

    <!-- Personal Info -->
    <div class="card lg:col-span-2">
      <div class="card-header"><div class="font-semibold text-white">Personal Information</div></div>
      <div class="card-body">
        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label class="form-label">Full Name *</label>
            <input type="text" name="name" value="{{ old('name', $settings->get('name')) }}" class="form-input" required>
          </div>
          <div>
            <label class="form-label">Professional Title *</label>
            <input type="text" name="title" value="{{ old('title', $settings->get('title')) }}" placeholder="Full Stack Developer" class="form-input" required>
          </div>
          <div class="sm:col-span-2">
            <label class="form-label">Tagline</label>
            <input type="text" name="tagline" value="{{ old('tagline', $settings->get('tagline')) }}" placeholder="I build things for the web." class="form-input">
          </div>
          <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $settings->get('email')) }}" class="form-input">
          </div>
          <div>
            <label class="form-label">Phone / WhatsApp</label>
            <input type="text" name="phone" value="{{ old('phone', $settings->get('phone')) }}" placeholder="+923089116512" class="form-input">
          </div>
          <div>
            <label class="form-label">Location</label>
            <input type="text" name="location" value="{{ old('location', $settings->get('location')) }}" placeholder="Lahore, Pakistan" class="form-input">
          </div>
          <div class="sm:col-span-2">
            <label class="form-label">Bio / About</label>
            <textarea name="bio" rows="3" class="form-input resize-none" placeholder="A short bio about yourself...">{{ old('bio', $settings->get('bio')) }}</textarea>
          </div>
        </div>
      </div>
    </div>

    <!-- Social Links -->
    <div class="card">
      <div class="card-header"><div class="font-semibold text-white">Social Links</div></div>
      <div class="card-body">
        <div class="mb-4">
          <label class="form-label"><i class="fab fa-github mr-2 text-gray-500"></i>GitHub</label>
          <input type="url" name="github" value="{{ old('github', $settings->get('github')) }}" placeholder="https://github.com/username" class="form-input">
        </div>
        <div class="mb-4">
          <label class="form-label"><i class="fab fa-linkedin mr-2 text-blue-500"></i>LinkedIn</label>
          <input type="url" name="linkedin" value="{{ old('linkedin', $settings->get('linkedin')) }}" placeholder="https://linkedin.com/in/username" class="form-input">
        </div>
        <div>
          <label class="form-label"><i class="fab fa-twitter mr-2 text-sky-400"></i>Twitter</label>
          <input type="url" name="twitter" value="{{ old('twitter', $settings->get('twitter')) }}" placeholder="https://twitter.com/username" class="form-input">
        </div>
      </div>
    </div>

  </div>

  <!-- Auto-Reply Template -->
  <div class="card mt-6">
    <div class="card-header">
      <div>
        <div class="font-semibold text-white"><i class="fas fa-reply mr-2 text-indigo-400"></i>Auto-Reply Template</div>
        <div style="font-size:0.75rem;color:#475569;margin-top:2px">Pre-filled message body when you reply to contact messages. You can always edit it before sending.</div>
      </div>
    </div>
    <div class="card-body">
      <textarea name="reply_template" rows="6" class="form-input resize-none" placeholder="Thank you for reaching out! I've received your message and will get back to you shortly...">{{ old('reply_template', $settings->get('reply_template', "Thank you for reaching out!\n\nI've received your message and will get back to you as soon as possible, usually within 24 hours.\n\nBest regards,")) }}</textarea>
      <p class="text-xs text-gray-600 mt-2">Tip: leave a blank line then your name — it auto-appends your name when composing replies.</p>
    </div>
  </div>

  <div class="flex gap-3 mt-6">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save All Settings</button>
    <a href="{{ route('portfolio') }}" target="_blank" class="btn btn-secondary"><i class="fas fa-eye"></i> Preview Portfolio</a>
  </div>
</form>

<script>
function prevPhoto(input) {
  if (input.files && input.files[0]) {
    const prev = document.getElementById('photoPrev');
    const ph = document.getElementById('photoPlaceholder');
    prev.src = URL.createObjectURL(input.files[0]);
    prev.classList.remove('hidden');
    if (ph) ph.style.display = 'none';
  }
}
</script>
@endsection
