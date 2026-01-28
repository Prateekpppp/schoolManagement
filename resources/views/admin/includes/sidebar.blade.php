
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="{{route('admin.index')}}"><img src="{{asset('/').($appdata->logo ?? 'not_found' )}}" width="50px" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item">
                            <a href="{{route('admin.index')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-calendar"></i><span>Session</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.dataSession')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Session</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addDatasession')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Session</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-school"></i><span>Academics</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.section')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Sections</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{route('admin.pages.addSection')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Section</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.classes')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Classes</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{route('admin.pages.addClass')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Class</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.subject')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Subject</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{route('admin.pages.addSubject')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Subject</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.homework')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Homework</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{route('admin.pages.addHomework')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Homework</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.exam')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Exam</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.task')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Task</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-users"></i><span>Member</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.staff')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Member</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addStaff')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Member</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.staffAttendance')}}" class="nav-link"><i class="fas fa-angle-right"></i>Attendance</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-graduation-cap"></i><span>Students</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.students')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addStudent')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Student</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.inactiveStudents')}}" class="nav-link"><i class="fas fa-angle-right"></i>Inactive Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.studentAttendance')}}" class="nav-link"><i class="fas fa-angle-right"></i>Attendance</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-coins"></i><span>Fee Collection</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.feeHead')}}" class="nav-link"><i class="fas fa-angle-right"></i>Fee Type</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.filterGenerateFee')}}" class="nav-link"><i class="fas fa-angle-right"></i>Generate Fee</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.feeInvoice')}}" class="nav-link"><i class="fas fa-angle-right"></i>Invoices</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.receipt')}}" class="nav-link"><i class="fas fa-angle-right"></i>Receipt</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-car"></i><span>Transport</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.driver')}}" class="nav-link"><i class="fas fa-angle-right"></i>Driver</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.vehicle')}}" class="nav-link"><i class="fas fa-angle-right"></i>Vehicle</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.allRoutes')}}" class="nav-link"><i class="fas fa-angle-right"></i>Routes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.assignedRouteVehicle')}}" class="nav-link"><i class="fas fa-angle-right"></i>Assign Vehicle/Routes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.assignedStudentRoute')}}" class="nav-link"><i class="fas fa-angle-right"></i>Assign Student/Routes</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i
                                    class="fa fa-calculator"></i><span>Expense</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.inventoryCategory')}}" class="nav-link"><i class="fas fa-angle-right"></i>Inventory Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.inventory')}}" class="nav-link"><i class="fas fa-angle-right"></i>Inventory Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.salary')}}" class="nav-link"><i class="fas fa-angle-right"></i>Salary</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-globe"></i><span>Frontend</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.jobs')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addJobs')}}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Add Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.applicants')}}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Applicants</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-bullhorn"></i><span>Notice</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.notice')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Notice</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-image"></i><span>Banner</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.banner')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Banner</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addBanner')}}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Add Banner</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="fa fa-camera"></i><span>Gallery</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.gallery')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addGallery')}}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Add Gallery</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.pages.setting')}}" class="nav-link"><i
                                    class="flaticon-settings"></i><span>Account</span></a>
                        </li>
                    </ul>
                </div>
            </div>
