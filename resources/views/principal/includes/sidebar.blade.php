
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="{{route('principal.index')}}"><img src="{{asset('/').($appdata->logo ?? 'not_found' )}}" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item">
                            <a href="{{route('principal.index')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('principal.pages.staffDetail',$currentLogin->id)}}" class="nav-link"><i class="flaticon-dashboard"></i><span>My Profile</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('principal.pages.addHomework')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Add Homework</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('principal.pages.homework')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>All Homework</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('principal.pages.staffSalary')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Salary Report</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('principal.pages.task')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>All Task</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('principal.pages.staffAttendance')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Attendance</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('principal.pages.studentAttendance')}}" class="nav-link"><i class="fas fa-angle-right"></i><span>Student Attendance</span></a>
                        </li>
                    </ul>
                </div>
            </div>
