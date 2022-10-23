
<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="http://localhost:8000/assets/" data-base-url="http://localhost:8000" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') </title>
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5, bootstrap 5 free, free admin template">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="tPVMig4u9MoRtl10iI3mLZzEo8dIJNvh5wdP163j">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-laravel-admin-template/">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="http://localhost:8000/assets/img/favicon/favicon.ico" />

    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    @include('layouts.header')
</head>

<body>
<!-- Layout Content -->
<div class="layout-wrapper layout-content-navbar ">
    <div class="layout-container">
    @include('layouts.menu')
        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
           @include('layouts.user_nav')
            <!-- / Navbar -->
            <!-- END: Navbar-->


            <!-- Content wrapper -->
            <div class="content-wrapper">

                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                  @yield('content')

                    <!-- pricingModal -->
                    <!--/ pricingModal -->

                </div>
                <!-- / Content -->

                <!-- Footer -->
                <!-- Footer-->
                {{--@include('layouts.overlay')--}}
                <div class="layout-overlay layout-menu-toggle"></div>
                <!--/ Footer-->
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->
<!--/ Layout Content -->

@include('layouts.footer')

</body>

</html>
