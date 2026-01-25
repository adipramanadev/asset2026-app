<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}">AS</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="active"><a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-fire"></i>
                <span>Dashboard</span></a></li>
        <li class="menu-header">Menu Utama</li>
        <li><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-th"></i> <span>Categories</span></a></li>
        <li><a class="nav-link" href="{{ route('profile.index') }}"><i class="far fa-user"></i> <span>Profile</span></a></li>
    </ul>
</aside>
