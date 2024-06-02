<nav class="navbar navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
            </li>
            @if(Auth::check() && Auth::user()->is_admin)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminMenuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="adminMenuDropdown">
                        <a class="dropdown-item" href="{{ route('reports.index') }}">Admin Reports</a>
                        <a class="dropdown-item" href="{{ route('users.create') }}">Create User</a>
                        <a class="dropdown-item" href="{{ route('access.create') }}">Assign Access</a>
                        <a class="dropdown-item" href="{{ route('user-management.index') }}">User Management</a>
                    </div>
                </li>
            @endif
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
