<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}">AS</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="active"><a class="nav-link" href="{{ url('/admin/home') }}"><i class="fas fa-fire"></i>
                <span>Dashboard</span></a></li>

        @if (auth()->user()->role === 'admin')
            <li class="menu-header">Menu Admin</li>
            <li><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-th"></i>
                    <span>Categories</span></a></li>
            <li><a class="nav-link" href="{{ route('location.index') }}"><i class="fas fa-map-marker-alt"></i>
                    <span>Lokasi</span></a></li>
            <li><a class="nav-link" href="{{ route('aset.index') }}"><i class="fas fa-boxes"></i> <span>Aset</span></a>
            </li>
            <li><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i> <span>Manajemen
                        User</span></a>
            </li>
        @elseif (auth()->user()->role === 'petugas')
            <li class="menu-header">Menu Petugas</li>
            <li><a class="nav-link" href="{{ route('aset.index') }}"><i class="fas fa-boxes"></i> <span>Data
                        Aset</span></a></li>
        @endif

        <li class="menu-header">Akun</li>
        <li><a class="nav-link" href="{{ route('profile.index') }}"><i class="far fa-user"></i> <span>Profile</span></a>
        </li>
    </ul>
</aside>
