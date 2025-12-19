<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')

    @yield('head')

</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        @include('navbar')
        
        <div class="content">
            @include('header')
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    @yield('body')
                </div>
            </div>
            @include('footer')
        </div>

    </div>
    @include('includes.app_toast')
    
    <script src="{{ asset('js') }}/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js') }}/tailwind.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib') }}/chart/chart.min.js"></script>
    <script src="{{ asset('lib') }}/easing/easing.min.js"></script>
    <script src="{{ asset('lib') }}/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('lib') }}/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('lib') }}/tempusdominus/js/moment.min.js"></script>
    <script src="{{ asset('lib') }}/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ asset('lib') }}/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('js') }}/main.js"></script>

    @include('includes.ajaxCalls')
    @include('includes.script')
    @yield('js')
</body>

</html>
