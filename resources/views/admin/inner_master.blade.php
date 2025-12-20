@extends('admin.master')

@section('body')
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
                
                    @yield('inner_body')
                    
                <!-- Footer Area Start Here -->
                @include('admin.includes.footer')
                <!-- Footer Area End Here -->
            </div>
        </div>

    </div>
    @endsection
    
    @section('js')
    
    <script src="{{ asset('js') }}/select2.min.js"></script>
    
    @yield('inner_js')
    @endsection