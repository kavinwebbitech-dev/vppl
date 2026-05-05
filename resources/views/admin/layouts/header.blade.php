<!-- Header -->
<div class="header">
    <div class="search mb-3">
        <input type="text" id="menuSearch" class="form-control"
            placeholder="Search menus...">
    </div>
    <style>
        .notification-dropdown {
            max-height: 320px;
            overflow-y: auto;
            width: 320px;
        }
    </style>
    <div class="d-flex align-items-center gap-3">
        <!-- Notifications -->
        <div class="dropdown">
            <button class="btn p-0 border-0 bg-transparent position-relative text-dark"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-bell fs-5"></i>
                @if($notifications->count() > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $notifications->count() }}
                @endif
                </span>
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 notification-dropdown">
                <li class="dropdown-header fw-semibold">Notifications</li>

                @forelse ($notifications as $notification)
                    <li>
                        <a class="dropdown-item small" href="{{ $notification->url ?? '#' }}">
                            🔔 {{ $notification->message }}
                        </a>
                    </li>
                @empty
                    <li class="dropdown-item text-muted text-center">No notifications</li>
                @endforelse

                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-center text-primary"
                    href="{{ route('notification.index') }}">
                        View all
                    </a>
                </li>
            </ul>

        </div>

        <!-- Profile -->
        <div class="dropdown">
            <button class="btn p-0 border-0 bg-transparent"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ Auth::user()->profile_image 
                        ? asset(Auth::user()->profile_image) 
                        : 'https://i.pravatar.cc/40' }}"
                    class="rounded-circle border"
                    width="40" height="40">
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3">
                <li class="px-3 py-2">
                    <strong>{{ Auth::user()->name }}</strong><br>
                    <small class="text-muted">{{ Auth::user()->email }}</small>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item" href="{{ route('setting.index') }}">
                        <i class="fa fa-user me-2"></i> Profile
                    </a>
                </li>

                {{-- <li>
                    <a class="dropdown-item" href="{{ route('setting.index') }}">
                        <i class="fa fa-gear me-2"></i> Settings
                    </a>
                </li> --}}

                <li><hr class="dropdown-divider"></li>

                <li>
                    <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger w-100 text-start">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</div>
