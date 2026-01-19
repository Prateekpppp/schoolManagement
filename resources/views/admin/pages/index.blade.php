@extends('admin.inner_master')

@section('inner_body')
    
                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.classes')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Classes</div>
                                        <div class="item-number"><span class="counter" data-num="{{$classes}}">{{$classes}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.section')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="fa fa-layer-group text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Sections</div>
                                        <div class="item-number"><span class="counter" data-num="{{$sections}}">{{$sections}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.students',['status'=>1])}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-couple text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Active Students</div>
                                        <div class="item-number"><span class="counter" data-num="{{$students}}">{{$students}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.students')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-red">
                                        <i class="flaticon-couple text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Inactive Students</div>
                                        <div class="item-number"><span class="counter" data-num="{{$inactiveStudents}}">{{$inactiveStudents}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.staff')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-multiple-users-silhouette text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Teachers</div>
                                        <div class="item-number"><span class="counter" data-num="{{$teachers}}">{{$teachers}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.staff')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-multiple-users-silhouette text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Staff</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$staff}}">{{$staff}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                {{-- </div>
                <div class="row gutters-20"> --}}
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.feeInvoice')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue ">
                                        <i class="fa fa-file-invoice text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Invoices</div>
                                        <div class="item-number"><span class="counter" data-num="{{$totalInvoice}}">{{$totalInvoice}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.receipt')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-file-invoice text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Paid Invoice</div>
                                        <div class="item-number"><span class="counter" data-num="{{$paidInvoice}}">{{$paidInvoice}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.generatedFee')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-red ">
                                        <i class="fa fa-file-invoice text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Dues</div>
                                        <div class="item-number"><span class="counter" data-num="{{$totalDue}}">{{$totalDue}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.receipt')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-money text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Payments</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$transactions}}">{{$transactions}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.jobs')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-dark">
                                        <i class="fa fa-briefcase text-gray"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Jobs</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$jobs}}">{{$jobs}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="fa fa-envelope text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Contact Inquiries</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$contactEnquiries}}">{{$contactEnquiries}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.banner')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green">
                                        <i class="fa fa-image text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Sliders</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$sliders}}">{{$sliders}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.gallery')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="fa fa-camera text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Gallery</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$gallery}}">{{$gallery}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.notice')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="fa fa-bullhorn text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Notice</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$notice}}">{{$notice}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.driver')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="fa fa-bullhorn text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Driver</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$driver}}">{{$driver}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.vehicle')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="fa fa-bullhorn text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Vehicle</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$vehicle}}">{{$vehicle}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.allRoutes')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="fa fa-bullhorn text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Routes</div>
                                        <div class="item-number"><span></span><span class="counter" data-num="{{$routes}}">{{$routes}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Dashboard summery End Here -->
                <!-- Dashboard Content Start Here -->
                <div class="row gutters-20">
                    <div class="col-12 col-xl-8 col-6-xxxl">
                        <div class="card dashboard-card-one pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Earnings</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="earning-report">
                                    <div class="item-content">
                                        <div class="single-item pseudo-bg-blue">
                                            <h4>Total Collections</h4>
                                            <span>75,000</span>
                                        </div>
                                        <div class="single-item pseudo-bg-red">
                                            <h4>Fees Collection</h4>
                                            <span>15,000</span>
                                        </div>
                                    </div>
                                    <div class="dropdown hidden">
                                        <a class="date-dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">Jan 20, 2019</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Jan 20, 2019</a>
                                            <a class="dropdown-item" href="#">Jan 20, 2021</a>
                                            <a class="dropdown-item" href="#">Jan 20, 2020</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="earning-chart-wrap">
                                    <canvas id="earning-line-chart" width="660" height="320"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4 col-3-xxxl hidden">
                        <div class="card dashboard-card-two pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Expenses</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="expense-report">
                                    <div class="monthly-expense pseudo-bg-Aquamarine">
                                        <div class="expense-date">Jan 2019</div>
                                        <div class="expense-amount"><span>$</span> 15,000</div>
                                    </div>
                                    <div class="monthly-expense pseudo-bg-blue">
                                        <div class="expense-date">Feb 2019</div>
                                        <div class="expense-amount"><span>$</span> 10,000</div>
                                    </div>
                                    <div class="monthly-expense pseudo-bg-yellow">
                                        <div class="expense-date">Mar 2019</div>
                                        <div class="expense-amount"><span>$</span> 8,000</div>
                                    </div>
                                </div>
                                <div class="expense-chart-wrap">
                                    <canvas id="expense-bar-chart" width="100" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 col-3-xxxl">
                        <div class="card dashboard-card-three pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Students</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="doughnut-chart-wrap">
                                    <canvas id="student-doughnut-chart" width="100" height="300"></canvas>
                                </div>
                                <div class="student-report">
                                    <div class="student-count pseudo-bg-blue">
                                        <h4 class="item-title">Girls</h4>
                                        <div class="item-number">{{ $female }}</div>
                                    </div>
                                    <div class="student-count pseudo-bg-yellow">
                                        <h4 class="item-title">Boys</h4>
                                        <div class="item-number">{{ $males }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 col-4-xxxl hidden">
                        <div class="card dashboard-card-four pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Event Calender</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="calender-wrap">
                                    <div id="fc-calender" class="fc-calender"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-4-xxxl hidden">
                        <div class="card dashboard-card-five pd-b-20">
                            <div class="card-body pd-b-14">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Website Traffic</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="traffic-title">Unique Visitors</h6>
                                <div class="traffic-number">2,590</div>
                                <div class="traffic-bar">
                                    <div class="direct" data-toggle="tooltip" data-placement="top" title="Direct">
                                    </div>
                                    <div class="search" data-toggle="tooltip" data-placement="top" title="Search">
                                    </div>
                                    <div class="referrals" data-toggle="tooltip" data-placement="top" title="Referrals">
                                    </div>
                                    <div class="social" data-toggle="tooltip" data-placement="top" title="Social">
                                    </div>
                                </div>
                                <div class="traffic-table table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="t-title pseudo-bg-Aquamarine">Direct</td>
                                                <td>12,890</td>
                                                <td>50%</td>
                                            </tr>
                                            <tr>
                                                <td class="t-title pseudo-bg-blue">Search</td>
                                                <td>7,245</td>
                                                <td>27%</td>
                                            </tr>
                                            <tr>
                                                <td class="t-title pseudo-bg-yellow">Referrals</td>
                                                <td>4,256</td>
                                                <td>8%</td>
                                            </tr>
                                            <tr>
                                                <td class="t-title pseudo-bg-red">Social</td>
                                                <td>500</td>
                                                <td>7%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-4-xxxl hidden">
                        <div class="card dashboard-card-six pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1 mg-b-17">
                                    <div class="item-title">
                                        <h3>Notice Board</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="notice-box-wrap">
                                    <div class="notice-list">
                                        <div class="post-date bg-skyblue">16 June, 2019</div>
                                        <h6 class="notice-title"><a href="#">Great School manag mene esom text of the
                                                printing.</a></h6>
                                        <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                                    </div>
                                    <div class="notice-list">
                                        <div class="post-date bg-yellow">16 June, 2019</div>
                                        <h6 class="notice-title"><a href="#">Great School manag printing.</a></h6>
                                        <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                                    </div>
                                    <div class="notice-list">
                                        <div class="post-date bg-pink">16 June, 2019</div>
                                        <h6 class="notice-title"><a href="#">Great School manag meneesom.</a></h6>
                                        <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                                    </div>
                                    <div class="notice-list">
                                        <div class="post-date bg-skyblue">16 June, 2019</div>
                                        <h6 class="notice-title"><a href="#">Great School manag mene esom text of the
                                                printing.</a></h6>
                                        <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                                    </div>
                                    <div class="notice-list">
                                        <div class="post-date bg-yellow">16 June, 2019</div>
                                        <h6 class="notice-title"><a href="#">Great School manag printing.</a></h6>
                                        <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                                    </div>
                                    <div class="notice-list">
                                        <div class="post-date bg-pink">16 June, 2019</div>
                                        <h6 class="notice-title"><a href="#">Great School manag meneesom.</a></h6>
                                        <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Content End Here -->
                <!-- Social Media Start Here -->
                <div class="row gutters-20 hidden">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-fb hover-fb">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Like us on facebook</h6>
                                    </div>
                                </div>
                                <div class="social-like">30,000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-twitter hover-twitter">
                                <div class="media media-none--lg">
                                        <div class="social-icon">
                                        <i class="fab fa-twitter"></i>
                                        </div>
                                        <div class="media-body space-sm">
                                            <h6 class="item-title">Follow us on twitter</h6>
                                        </div>
                                </div>
                                <div class="social-like">1,11,000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-gplus hover-gplus">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fab fa-google-plus-g"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Follow us on googleplus</h6>
                                    </div>
                                </div>
                                <div class="social-like">19,000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-linkedin hover-linked">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                    <i class="fab fa-linkedin-in"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Follow us on linked</h6>
                                    </div>
                                </div>
                                <div class="social-like">45,000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social Media End Here -->
@endsection


@section('inner_js')
<script>
    console.log('after');
    
</script>
@endsection