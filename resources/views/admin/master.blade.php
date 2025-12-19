<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.admin_head')

    @yield('admin_head')
    <script src="{{ asset('js') }}/modernizr-3.6.0.min.js"></script>

</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    
    <div id="wrapper" class="wrapper bg-ash">
        
        @include('admin.includes.navbar')
        
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            @include('admin.includes.sidebar')
            <!-- Sidebar Area End Here -->
            
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                @include('admin.includes.breadcrumb')
                <!-- Breadcubs Area End Here -->
                
                    @yield('body')
                    
                <!-- Footer Area Start Here -->
                @include('admin.includes.footer')
                <!-- Footer Area End Here -->
            </div>
        </div>

    </div>
    @include('includes.app_toast')
    
    <script src="{{ asset('js') }}/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js') }}/plugins.js"></script>
    <script src="{{ asset('js') }}/popper.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('js') }}/jquery.counterup.min.js"></script>
    <script src="{{ asset('js') }}/moment.min.js"></script>
    <script src="{{ asset('js') }}/jquery.waypoints.min.js"></script>
    <script src="{{ asset('js') }}/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('js') }}/fullcalendar.min.js"></script>
    <script src="{{ asset('js') }}/Chart.min.js"></script>
    {{-- <script src="{{ asset('js') }}/tailwind.min.js"></script> --}}
    <script src="{{ asset('js') }}/main.js"></script>

    @include('includes.ajaxCalls')
    @include('includes.script')
    @yield('js')
</body>

</html>
