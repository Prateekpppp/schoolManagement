@extends('student.master')

@section('body')
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    
    <div id="wrapper" class="wrapper bg-ash">
        
        @include('student.includes.navbar')
        
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            @include('student.includes.sidebar')
            <!-- Sidebar Area End Here -->
            
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                @include('student.includes.breadcrumb')
                <!-- Breadcubs Area End Here -->
                
                    @yield('inner_body')
                    
                <!-- Footer Area Start Here -->
                @include('student.includes.footer')
                <!-- Footer Area End Here -->
            </div>
        </div>

    </div>
    @endsection
    
    @section('js')
    
    
    @yield('inner_js')
    @endsection