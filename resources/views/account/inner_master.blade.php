@extends('staff.master')

@section('body')
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    
    <div id="wrapper" class="wrapper bg-ash">
        
        @include('staff.includes.navbar')
        
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            @include('staff.includes.sidebar')
            <!-- Sidebar Area End Here -->
            
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                @include('staff.includes.breadcrumb')
                <!-- Breadcubs Area End Here -->
                
                    @yield('inner_body')
                    
                <!-- Footer Area Start Here -->
                @include('staff.includes.footer')
                <!-- Footer Area End Here -->
            </div>
        </div>

    </div>
    @endsection
    
    @section('js')
    
    
    @yield('inner_js')
    @endsection