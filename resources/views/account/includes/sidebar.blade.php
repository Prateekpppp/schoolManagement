
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="{{route('admin.index')}}"><img src="{{asset('/').($appdata->logo ?? 'not_found' )}}" width="50px" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item">
                            <a href="{{route('account.pages.dashboard')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
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
                            <a href="#" class="nav-link"><i
                                    class="fa fa-calculator"></i><span>Expense</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.inventoryCategory')}}" class="nav-link"><i class="fas fa-angle-right"></i>Inventory Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.inventory')}}" class="nav-link"><i class="fas fa-angle-right"></i>Inventory Invoice</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{route('admin.pages.salary')}}" class="nav-link"><i class="fas fa-angle-right"></i>Salary</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{route('admin.pages.expanse')}}" class="nav-link"><i class="fas fa-angle-right"></i>Expense</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
