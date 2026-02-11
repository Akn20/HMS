<div class="sidebar-logo text-center">
    @if(auth()->user()->role_id == 1)
        <img src="{{ asset('assets/images/admin-logo.png') }}" alt="Admin Logo">
        <p class="fw-bold text-danger">ADMIN PANEL</p>
    @else
        <img src="{{ asset('assets/images/user-logo.png') }}" alt="User Logo">
        <p class="fw-bold">USER DASHBOARD</p>
    @endif
</div>
<ul class="sidebar-menu">
    <li>
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    @if(auth()->user()->role->name == 'Admin')
    <li>
        <a href="{{ route('roles.index') }}">
            <i class="bi bi-shield"></i>
            <span>Roles Management</span>
        </a>
    </li>
@endif



    <!--@if(auth()->user()->role_id == 1)
        <li>
            <a href="{{ route('admin.users') }}">Manage Users</a>
        </li>
    @endif-->
</ul>
