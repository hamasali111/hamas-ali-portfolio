<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login — Portfolio</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<style>
  body{font-family:'Inter',sans-serif;background:#080d1e;min-height:100vh;display:flex;align-items:center;justify-content:center}
  .bg-glow{position:fixed;inset:0;background:radial-gradient(ellipse at 30% 40%,rgba(99,102,241,0.1) 0%,transparent 60%),radial-gradient(ellipse at 70% 60%,rgba(6,182,212,0.06) 0%,transparent 60%);pointer-events:none}
  .login-card{background:#0d1428;border:1px solid rgba(255,255,255,0.08);border-radius:24px;padding:2.5rem;width:100%;max-width:420px;position:relative;z-index:1}
  .form-input{width:100%;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#e2e8f0;font-size:0.9rem;transition:all 0.2s;outline:none;font-family:inherit}
  .form-input:focus{border-color:#6366f1;background:rgba(99,102,241,0.05);box-shadow:0 0 0 3px rgba(99,102,241,0.1)}
  .form-input::placeholder{color:#334155}
  .btn-submit{width:100%;background:linear-gradient(135deg,#6366f1,#4f46e5);color:#fff;padding:12px;border-radius:10px;font-weight:600;font-size:0.95rem;border:none;cursor:pointer;transition:all 0.2s;font-family:inherit}
  .btn-submit:hover{opacity:0.9;transform:translateY(-1px);box-shadow:0 8px 30px rgba(99,102,241,0.4)}
  .grad-text{background:linear-gradient(135deg,#6366f1,#06b6d4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
  .input-group{position:relative}
  .input-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#334155;font-size:0.9rem}
  .input-group .form-input{padding-left:40px}
</style>
</head>
<body>
<div class="bg-glow"></div>
<div class="login-card">
  <div class="text-center mb-8">
    <div class="text-2xl font-bold mb-1"><span class="grad-text">{ </span><span class="text-white">Portfolio</span><span class="grad-text"> }</span></div>
    <div class="text-gray-400 text-sm">Admin Panel — Secure Access</div>
  </div>

  @if(session('error'))
  <div style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.2);border-radius:10px;padding:10px 14px;margin-bottom:1.5rem;color:#fca5a5;font-size:0.875rem;display:flex;align-items:center;gap:8px">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
  </div>
  @endif

  <form method="POST" action="{{ route('admin.login.post') }}">
    @csrf
    <div class="mb-5">
      <label class="block text-sm font-medium text-gray-400 mb-2">Email Address</label>
      <div class="input-group">
        <i class="fas fa-envelope input-icon"></i>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@example.com" class="form-input" required autofocus>
      </div>
      @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="mb-8">
      <label class="block text-sm font-medium text-gray-400 mb-2">Password</label>
      <div class="input-group">
        <i class="fas fa-lock input-icon"></i>
        <input type="password" name="password" placeholder="••••••••" class="form-input" required>
      </div>
      @error('password')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <button type="submit" class="btn-submit">
      <i class="fas fa-sign-in-alt mr-2"></i> Sign In to Admin
    </button>
  </form>

  <div class="text-center mt-6">
    <a href="{{ route('portfolio') }}" class="text-gray-600 hover:text-gray-400 text-sm">
      <i class="fas fa-arrow-left mr-1"></i> Back to Portfolio
    </a>
  </div>
</div>
</body>
</html>
