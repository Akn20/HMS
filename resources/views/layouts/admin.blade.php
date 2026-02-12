<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('partials.head')
</head>

<body>

    @include('partials.sidebar')

    @include('partials.navbar')

    <main class="nxl-container px-4">
      <div class="nxl-content">
        @yield('content')
      </div>

      @include('partials.footer')
    </main>


    <!--! BEGIN: Vendors JS !-->
    @include('partials.scripts')
    <!--! END: Theme Customizer !-->
</body>

</html>