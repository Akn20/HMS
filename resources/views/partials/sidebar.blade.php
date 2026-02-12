<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="#" class="b-brand">
                <img src="assets/images/logo-full.png" alt="" class="logo logo-lg" />
                <img src="assets/images/logo-abbr.png" alt="" class="logo logo-sm" />
            </a>
        </div>

        <div class="navbar-content">
            <ul class="nxl-navbar">

                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>

                <!-- Religion -->
                <li class="nxl-item">
                    <a href="{{ route('religion.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Religion</span>
                    </a>
                </li>

                <!-- Job Type -->
                <li class="nxl-item">
                    <a href="{{ route('job-type.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-cast"></i></span>
                        <span class="nxl-mtext">Job Type</span>
                    </a>
                </li>

                <!-- Work Status -->
                <li class="nxl-item">
                    <a href="{{ route('work-status.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-send"></i></span>
                        <span class="nxl-mtext">Work Status</span>
                    </a>
                </li>

                <!-- Blood Group -->
                <li class="nxl-item">
                    <a href="{{ route('blood-groups.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-droplet"></i></span>
                        <span class="nxl-mtext">Blood Group</span>
                    </a>
                </li>

                <!--Department-->
                <li class="nxl-item">
                    <a href="{{ route('departments.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-grid"></i></span>
                        <span class="nxl-mtext">Department</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
