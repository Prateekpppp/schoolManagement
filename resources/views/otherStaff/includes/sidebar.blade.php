
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="{{route('staff.index')}}"><img src="{{asset('/').($appdata->logo ?? 'not_found' )}}" width="50px" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item">
                            <a href="{{route('staff.index')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('staff.pages.staffAttendance')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Attendance</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('staff.pages.staffSalary')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Salary Report</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('staff.pages.applicationletter')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Application Letter</span></a>
                        </li>
                    </ul>
                </div>
            </div>
