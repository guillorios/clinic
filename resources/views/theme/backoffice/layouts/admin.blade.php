<!DOCTYPE html>
<html lang="en">
  <!--================================================================================
	Item Name: Clinic
	Version: 1.0
	Author: GUILLERMO RIOS
	Author URL: https://sioningeneiria.com.co
  ================================================================================ -->
  <head>

    <title>@yield('title')</title>

    @include('theme.backoffice.layouts.includes.head')

  </head>

  <body>

    <!-- Start Page Loading -->
    @include('theme.backoffice.layouts.includes.loader')
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    @include('theme.backoffice.layouts.includes.header')
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        @include('theme.backoffice.layouts.includes.left-sidebar')
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        @include('theme.backoffice.layouts.includes.breadcrumbs')
        <!-- START CONTENT -->
        @yield('content')
        <!-- END CONTENT -->

        <!-- START RIGHT SIDEBAR NAV-->
        @include('theme.backoffice.layouts.includes.right-sidebar')
        <!-- END RIGHT SIDEBAR NAV-->
      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    @include('theme.backoffice.layouts.includes.footer')
    <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->
    @include('theme.backoffice.layouts.includes.foot')

  </body>
</html>
