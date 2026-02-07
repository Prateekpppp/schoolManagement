@extends('admin.inner_master')

@section('inner_body')
    
                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.feeInvoice')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Today's Fee Dues</div>
                                        <div class="item-number"><span class="counter" data-num="{{$todayDueAmount}}">{{$todayDueAmount}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.feeInvoice')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Fee Dues</div>
                                        <div class="item-number"><span class="counter" data-num="{{$totalDueAmount}}">{{$totalDueAmount}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.feeInvoice')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Today's Fee Paid</div>
                                        <div class="item-number"><span class="counter" data-num="{{$todayPaidAmount}}">{{$todayPaidAmount}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.feeInvoice')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Fee Paid</div>
                                        <div class="item-number"><span class="counter" data-num="{{$totalPaidAmount}}">{{$totalPaidAmount}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.expanse')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Inventory Invoice</div>
                                        <div class="item-number"><span class="counter" data-num="{{$inventory}}">{{$inventory}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.salary')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Salary</div>
                                        <div class="item-number"><span class="counter" data-num="{{$total_salary}}">{{$total_salary}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.salary')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Deposit</div>
                                        <div class="item-number"><span class="counter" data-num="{{$security_deposit}}">{{$security_deposit}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.expanse')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Expense</div>
                                        <div class="item-number"><span class="counter" data-num="{{$expanse}}">{{$expanse}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('admin.pages.expanse')}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Today's Expense</div>
                                        <div class="item-number"><span class="counter" data-num="{{$todayExpanse}}">{{$todayExpanse}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Social Media End Here -->
@endsection


@section('inner_js')
<script>
    console.log('after');
    
</script>
@endsection