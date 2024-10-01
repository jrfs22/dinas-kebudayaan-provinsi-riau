<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouting.auth._partials.headers')

</head>

<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layouting.auth._partials.sidebar')
        <div class="body-wrapper">
            @include('layouting.auth._partials.navbar')

            <div class="container-fluid">
                @yield('breadcrumb')

                @yield('content')
                @include('layouting.auth._partials.footer')
            </div>
        </div>
    </div>

    @include('layouting.auth._partials.scripts')
</body>

</html>
