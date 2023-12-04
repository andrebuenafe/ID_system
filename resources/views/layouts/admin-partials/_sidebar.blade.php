<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-solid fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ID Admin</div>
    </a>

    <!-- Nav Item - Dashboard -->

    <li class="nav-item {{ Str::startsWith(request()->path(), 'admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>


    <!-- Nav Item - User -->

    <li class="nav-item {{ Str::startsWith(request()->path(), 'users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Users</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
