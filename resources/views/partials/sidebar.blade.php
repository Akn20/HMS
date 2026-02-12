<nav class="nxl-navigation">
    <div class="navbar-wrapper">

        {{-- ================= LOGO ================= --}}
        <div class="m-header">
            <a href="{{ url('/') }}" class="b-brand">
                <img src="{{ asset('assets/images/logo-full.png') }}" alt="" class="logo logo-lg" />
                <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="" class="logo logo-sm" />
            </a>
        </div>

        {{-- ================= SIDEBAR MENU ================= --}}
        <div class="navbar-content">
            <ul class="nxl-navbar">

                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>

                {{-- ================= DASHBOARD ================= --}}
                <li class="nxl-item">
                    <a href="{{ url('/') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-home"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>

                {{-- ================= ORGANIZATION ================= --}}
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-cast"></i></span>
                        <span class="nxl-mtext">Organization</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('organization.index') }}">
                                All Organizations
                            </a>
                        </li>
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('organization.create') }}">
                                Add Organization
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ================= INSTITUTION ================= --}}
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-send"></i></span>
                        <span class="nxl-mtext">Institution</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('institutions.index') }}">
                                All Institutions
                            </a>
                        </li>
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ route('institutions.create') }}">
                                Add Institution
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ================= MODULE MANAGEMENT ================= --}}
                <li class="nxl-item">
    <a href="{{ route('modules.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="feather-grid"></i></span>
        <span class="nxl-mtext">Module Management</span>
    </a>
</li>


            </ul>
        </div>

    </div>
</nav>
