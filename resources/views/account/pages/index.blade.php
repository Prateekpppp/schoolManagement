@extends('staff.inner_master')

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
                                        <div class="item-title">This Month</div>
                                        <div class="">Total Present</div>
                                        <div class="item-number"><span class="counter" data-num="{{$present}}">{{$present}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
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
                                        <div class="item-title">This Month</div>
                                        <div class="">Total Absent</div>
                                        <div class="item-number"><span class="counter" data-num="{{$absent}}">{{$absent}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
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
                                        <div class="item-title">This Month</div>
                                        <div class="">Current Salary</div>
                                        <div class="item-number"><span class="counter" data-num="{{$classes}}">{{$classes}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
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
                                        <div class="item-title">Salary Report</div>
                                        <div class="item-number"><span class="counter" data-num="{{$classes}}">{{$classes}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
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
                                        <div class="item-title">Notice</div>
                                        <div class="item-number"><span class="counter" data-num="{{$classes}}">{{$classes}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
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
                                        <div class="item-title">Notice</div>
                                        <div class="item-number"><span class="counter" data-num="{{$classes}}">{{$classes}}</span></div>
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