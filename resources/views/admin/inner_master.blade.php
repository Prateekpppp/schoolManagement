@extends('admin.master')

@section('body')
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    
    <div id="wrapper" class="wrapper bg-ash">
        
        @include('admin.includes.navbar')
        
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">

            @if($currentUser->status == 1 || $currentUser->status == 2)
            {{-- 1 = main_admin, 2 = admin --}}
            <!-- Sidebar Area Start Here -->
            @include('admin.includes.sidebar')
            <!-- Sidebar Area End Here -->

            @elseif($currentUser->status == 3)
            {{-- 3 = principal --}}
            <!-- Sidebar Area Start Here -->
            @include('principal.includes.sidebar')
            <!-- Sidebar Area End Here -->

            @elseif($currentUser->status == 4)
            {{-- 4 = staff --}}
            <!-- Sidebar Area Start Here -->
            @include('staff.includes.sidebar')
            <!-- Sidebar Area End Here -->

            @elseif($currentUser->status == 5)
            {{-- 5 = parent --}}
            <!-- Sidebar Area Start Here -->
            @include('student.includes.sidebar')
            <!-- Sidebar Area End Here -->
            @endif



            <div class="dashboard-content-one">
                
                @if($currentUser->status == 1 || $currentUser->status == 2)
                {{-- 1 = main_admin, 2 = admin --}}
                <!-- Breadcubs Area Start Here -->
                @include('admin.includes.breadcrumb')
                <!-- Breadcubs Area End Here -->

                @elseif($currentUser->status == 3)
                {{-- 3 = principal --}}
                <!-- Breadcubs Area Start Here -->
                
                @include('principal.includes.breadcrumb')
                <!-- Breadcubs Area End Here -->
                @elseif($currentUser->status == 4)
                {{-- 4 = staff --}}
                <!-- Breadcubs Area Start Here -->
                @include('staff.includes.breadcrumb')
                <!-- Breadcubs Area End Here -->

                @elseif($currentUser->status == 5)
                {{-- 5 = parent --}}
                <!-- Breadcubs Area Start Here -->
                @include('student.includes.breadcrumb')
                <!-- Breadcubs Area End Here -->
                @endif
                
                    @yield('inner_body')
                    
                <!-- Footer Area Start Here -->
                @include('admin.includes.footer')
                <!-- Footer Area End Here -->
            </div>
        </div>

    </div>
    @endsection
    
    @section('js')
    
    
    @yield('inner_js')
    @endsection