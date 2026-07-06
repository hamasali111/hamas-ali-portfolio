<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind = {
            config: {}
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #080d1e;
            color: #e2e8f0;
            min-height: 100vh
        }

        ::-webkit-scrollbar {
            width: 4px;
            height: 4px
        }

        ::-webkit-scrollbar-track {
            background: #0f172a
        }

        ::-webkit-scrollbar-thumb {
            background: #4f46e5;
            border-radius: 4px
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 260px;
            background: #0d1428;
            border-right: 1px solid rgba(255, 255, 255, 0.06);
            z-index: 100;
            transition: transform 0.3s;
            overflow-y: auto
        }

        .sidebar-logo {
            padding: 1.5rem 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06)
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 10px;
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
            margin: 2px 8px;
            text-decoration: none
        }

        .nav-item:hover,
        .nav-item.active {
            background: rgba(99, 102, 241, 0.1);
            color: #a5b4fc;
            border: none
        }

        .nav-item.active {
            background: rgba(99, 102, 241, 0.15);
            color: #818cf8
        }

        .nav-item i {
            width: 18px;
            text-align: center;
            font-size: 1rem
        }

        .nav-section {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #334155;
            padding: 1rem 1.5rem 0.5rem
        }

        .main {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column
        }

        .topbar {
            background: #0d1428;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50
        }

        .content {
            flex: 1;
            padding: 2rem
        }

        .card {
            background: #0f1a35;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            overflow: hidden
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            display: flex;
            align-items: center;
            justify-content: between;
            gap: 1rem
        }

        .card-body {
            padding: 1.5rem
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            border: none
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-1px)
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.2)
        }

        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.2)
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            color: #94a3b8;
            border: 1px solid rgba(255, 255, 255, 0.1)
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #e2e8f0
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.8rem
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            color: #94a3b8;
            margin-bottom: 6px
        }

        .form-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 10px 14px;
            color: #e2e8f0;
            font-size: 0.9rem;
            transition: all 0.2s;
            outline: none
        }

        .form-input:focus {
            border-color: #6366f1;
            background: rgba(99, 102, 241, 0.05);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1)
        }

        .form-input::placeholder {
            color: #334155
        }

        select.form-input option {
            background: #0f1a35
        }

        .table-wrap {
            overflow-x: auto
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        th {
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #475569;
            padding: 12px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06)
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            font-size: 0.875rem;
            vertical-align: middle
        }

        tr:last-child td {
            border-bottom: none
        }

        tr:hover td {
            background: rgba(255, 255, 255, 0.02)
        }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600
        }

        .badge-success {
            background: rgba(34, 197, 94, 0.1);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.2)
        }

        .badge-muted {
            background: rgba(255, 255, 255, 0.05);
            color: #475569;
            border: 1px solid rgba(255, 255, 255, 0.06)
        }

        .badge-primary {
            background: rgba(99, 102, 241, 0.1);
            color: #a5b4fc;
            border: 1px solid rgba(99, 102, 241, 0.2)
        }

        .badge-warning {
            background: rgba(251, 191, 36, 0.1);
            color: #fde68a;
            border: 1px solid rgba(251, 191, 36, 0.2)
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #86efac
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5
        }

        .page-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #f1f5f9
        }

        .page-subtitle {
            font-size: 0.875rem;
            color: #475569;
            margin-top: 2px
        }

        .stat-mini {
            background: #0f1a35;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem
        }

        .stat-mini-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0
        }

        .grad-text {
            background: linear-gradient(135deg, #6366f1, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        @media(max-width:1024px) {
            .sidebar {
                transform: translateX(-100%)
            }

            .sidebar.open {
                transform: translateX(0)
            }

            .main {
                margin-left: 0
            }
        }

        @media(max-width:768px) {
            .content {
                padding: 1rem
            }

            .topbar {
                padding: 0.75rem 1rem
            }
        }

        @media(max-width:480px) {
            .page-title {
                font-size: 1.1rem
            }

            .stat-mini {
                padding: 1rem
            }

            .stat-mini-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem
            }
        }

        #sidebarOverlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            z-index: 99;
            backdrop-filter: blur(2px)
        }
    </style>
</head>

<body>

    <!-- Sidebar Overlay (mobile) -->
    <div id="sidebarOverlay" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <div class="text-lg font-bold"><span class="grad-text">{ </span><span
                    class="text-white"> Portfolio</span><span class="grad-text"> }</span></div>
            <div class="text-xs text-gray-500 mt-1">Admin Panel</div>
        </div>

        <div style="padding:1rem 0">
            <div class="nav-section">Main</div>
            <a href="{{ route('admin.dashboard') }}"
                class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>

            <div class="nav-section">Content</div>
            <a href="{{ route('admin.skills.index') }}"
                class="nav-item {{ request()->routeIs('admin.skills*') ? 'active' : '' }}">
                <i class="fas fa-code"></i> Skills
            </a>
            <a href="{{ route('admin.experiences.index') }}"
                class="nav-item {{ request()->routeIs('admin.experiences*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i> Experience
            </a>
            <a href="{{ route('admin.projects.index') }}"
                class="nav-item {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                <i class="fas fa-folder-open"></i> Projects
            </a>
            <a href="{{ route('admin.testimonials.index') }}"
                class="nav-item {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                <i class="fas fa-star"></i> Testimonials
            </a>

            <div class="nav-section">Communication</div>
            <a href="{{ route('admin.messages.index') }}"
                class="nav-item {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Messages
                @php $unread = \App\Models\Message::unread()->count() @endphp
                @if ($unread > 0)
                    <span
                        style="background:#ef4444;color:#fff;font-size:0.7rem;font-weight:700;padding:2px 7px;border-radius:50px;margin-left:auto">{{ $unread }}</span>
                @endif
            </a>

            <div class="nav-section">Settings</div>
            <a href="{{ route('admin.profile') }}"
                class="nav-item {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                <i class="fas fa-user-circle"></i> My Profile
            </a>
            <a href="{{ route('admin.settings.index') }}"
                class="nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Site Settings
            </a>

            <div style="padding:1rem 8px;margin-top:1rem;border-top:1px solid rgba(255,255,255,0.06)">
                <a href="{{ route('portfolio') }}" target="_blank" class="nav-item">
                    <i class="fas fa-external-link-alt"></i> View Portfolio
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="nav-item w-full text-left"
                        style="background:none;border:none;cursor:pointer;color:inherit">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="topbar">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white"
                    style="background:none;border:none;font-size:1.2rem;cursor:pointer">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <div class="page-title">@yield('page-title', 'Dashboard')</div>
                    <div class="page-subtitle">@yield('page-subtitle', '')</div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.profile') }}" class="text-right hidden sm:block" style="text-decoration:none">
                    <div class="text-sm font-medium text-gray-200 hover:text-white">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-500">Administrator</div>
                </a>
                <a href="{{ route('admin.profile') }}" title="Edit Profile"
                    style="width:38px;height:38px;border-radius:10px;background:rgba(99,102,241,0.2);border:1px solid rgba(99,102,241,0.3);display:flex;align-items:center;justify-content:center;color:#a5b4fc;font-size:0.9rem;overflow:hidden;text-decoration:none;flex-shrink:0">
                    @if (auth()->user()->photo)
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile"
                            style="width:100%;height:100%;object-fit:cover">
                    @else
                        <i class="fas fa-user"></i>
                    @endif
                </a>
            </div>
        </div>

        <div class="content">
            @if (session('success'))
                <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </div>

    @stack('scripts')
    <script>
        function toggleSidebar() {
            const s = document.getElementById('sidebar');
            const o = document.getElementById('sidebarOverlay');
            const open = s.classList.toggle('open');
            o.style.display = open ? 'block' : 'none';
            document.body.style.overflow = open ? 'hidden' : '';
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('sidebarOverlay').style.display = 'none';
            document.body.style.overflow = '';
        }
        // Close sidebar on nav-item click (mobile)
        document.querySelectorAll('.nav-item').forEach(el => {
            el.addEventListener('click', () => {
                if (window.innerWidth < 1024) closeSidebar();
            });
        });
    </script>
</body>

</html>
