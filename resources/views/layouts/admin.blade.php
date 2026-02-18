<!DOCTYPE html>
<html lang="zxx">

<head>
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @include('partials.head')
    <style>
        .status-toggle {
            width: 100px;
            height: 30px;
            border-radius: 50px;
            border: none;
            position: relative;
            cursor: pointer;
            transition: 0.3s;
            font-size: 12px;
            font-weight: 600;
            color: #fff;
            padding: 0 12px;
            display: flex;
            align-items: center;
        }

        /* Active */
        .status-toggle.active {
            background: #28a745;
            justify-content: flex-end;
            /* text on right */
        }

        /* Inactive */
        .status-toggle.inactive {
            background: #dc3545;
            justify-content: flex-start;
            /* text on left */
        }

        /* White circle */
        .status-toggle::before {
            content: "";
            position: absolute;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: white;
            top: 4px;
            transition: 0.3s;
        }

        /* Circle position */
        .status-toggle.active::before {
            left: 4px;
        }

        .status-toggle.inactive::before {
            right: 4px;
        }

        /* Keep text above */
        .status-toggle span {
            position: relative;
            z-index: 2;
        }
    </style>


=======
    @include('partials.head')

    <style>
        .form-label {
            font-size: 14px;
            font-weight: 600;
        }

        .form-control,
        .form-select,
        textarea {
            font-size: 14px !important;
        }

        textarea.form-control {
            height: auto;
        }
    </style>

>>>>>>> origin/main
</head>

<body>

    @include('partials.sidebar')

    @include('partials.navbar')

<<<<<<< HEAD
    <main class="nxl-container px-4">
        <div class="nxl-content">
            @yield('content')
        </div>

        @include('partials.footer')
    </main>



    <!--! BEGIN: Vendors JS !-->
    @include('partials.scripts')
    @yield('scripts')
    <!--! END: Theme Customizer !-->


=======
    <main class="nxl-container">
        <div class="nxl-content px-4">
            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ERROR MESSAGE --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>

        <!-- [ Footer ] start -->
        @include('partials.footer')
        <!-- [ Footer ] end -->
    </main>
    <!-- hello -->
    <!--! BEGIN: Vendors JS !-->
    @include('partials.scripts')
    <!--! END: Theme Customizer !-->
>>>>>>> origin/main
</body>

</html>