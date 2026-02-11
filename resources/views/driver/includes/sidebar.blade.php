
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="{{route('admin.index')}}"><img src="{{asset('/').($appdata->logo ?? 'not_found' )}}" width="50px" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item">
                            <a href="{{route('admin.index')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('driver.pages.driverRoutes')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Routes</span></a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('admin.pages.assignedStudentRoute')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Assign Student/Routes</span></a>
                        </li> --}}
                    </ul>
                </div>
            </div>
