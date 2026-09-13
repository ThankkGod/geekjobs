<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

    @include('agent.section.header')
<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
          @include('agent.section.sidebar')
        </div>

        

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
                @include('agent.section.navbar')
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
              @yield('content')
                <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
           @include('agent.section.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>


        <!-- custom dmeo js-->
        <script src="{{ asset('backend/assets/js/pages/materialdesign.js') }}"></script>

    <!-- Knob charts js -->
    <script src="{{ asset('backend/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <!-- Sparkline Js-->
    <script src="{{ asset('backend/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/raphael/raphael.min.js') }}"></script>

    <!-- Dashboard init-->
    <script src="{{ asset('backend/assets/js/pages/dashboard.js') }}"></script>

</body>

</html>