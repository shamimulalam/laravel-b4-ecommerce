<!DOCTYPE html>
<html>
<head>
    @include('layouts.admin._head')
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        @include('layouts.admin._topNav')
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        @include('layouts.admin._leftNav')
    </div>
    <!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @yield('content')
            </div> <!-- container -->

        </div> <!-- content -->

        @include('layouts.admin._footer')

    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->

@include('layouts.admin._scripts')

</body>
</html>