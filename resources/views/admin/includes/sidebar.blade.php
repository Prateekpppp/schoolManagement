
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="{{route('admin.index')}}"><img src="{{asset('/').($appdata->logo ?? 'not_found' )}}" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{route('admin.index')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Admin</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="index3.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index4.html" class="nav-link"><i class="fas fa-angle-right"></i>Parents</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index5.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Teachers</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Session</span></a>
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
                            <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Academics</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.section')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Sections</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addSection')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Section</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.classes')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Classes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addClass')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Class</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.subject')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Subject</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addSubject')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Subject</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Member</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.staff')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Member</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addStaff')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Member</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.students')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.addStudent')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Student</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Fee Collection</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.feeHead')}}" class="nav-link"><i class="fas fa-angle-right"></i>Fee Type</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.generateFee')}}" class="nav-link"><i class="fas fa-angle-right"></i>Generate Fee</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.generatedFee')}}" class="nav-link"><i class="fas fa-angle-right"></i>Invoices</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.receipt')}}" class="nav-link"><i class="fas fa-angle-right"></i>Receipt</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Frontend</span></a>
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
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Notice</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.notice')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Notice</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Banner</span></a>
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
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Gallery</span></a>
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
