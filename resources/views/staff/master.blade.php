<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.admin_head')

    @yield('admin_head')
    <script src="{{ asset('js') }}/modernizr-3.6.0.min.js"></script>

</head>

<body>
        @yield('body')
    @include('includes.app_toast')
    
    <script src="{{ asset('js') }}/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js') }}/plugins.js"></script>
    <script src="{{ asset('js') }}/popper.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('js') }}/jquery.counterup.min.js"></script>
    <script src="{{ asset('js') }}/tailwind.min.js"></script>
    <script src="{{ asset('js') }}/select2.min.js"></script>
    <script src="{{ asset('js') }}/moment.min.js"></script>
    <script src="{{ asset('js') }}/jquery.waypoints.min.js"></script>
    <script src="{{ asset('js') }}/datepicker.min.js"></script>
    <script src="{{ asset('js') }}/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('js') }}/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js') }}/fullcalendar.min.js"></script>
    <script src="{{ asset('js') }}/Chart.min.js"></script>
    <script src="{{ asset('js') }}/main.js"></script>

    <script>
        $(document).ready(function(){
            // nav link active as url
            let href = window.location.href;
            let anchor = $(`a.nav-link[href="${href}"]`);
            
            anchor.addClass('menu-active');
            anchor.parents('ul').addClass('sub-group-active');
        });
    </script>

    @include('includes.ajaxCalls')
    @include('includes.admin_js')
    @include('includes.script')
    @yield('js')
</body>

</html>
