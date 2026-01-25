<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}">LA</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="active"><a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-fire"></i>
                <span>Dashboard</span></a></li>
        <li class="menu-header">Pages</li>
        <li><a class="nav-link" href="#"><i class="far fa-user"></i> <span>Profile</span></a></li>
    </ul>
</aside>
