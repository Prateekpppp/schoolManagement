@extends('admin.inner_master')

@section('inner_body')

                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Route Data</h3>
                            </div>
                            <div class="">
                                <a href="{{route('admin.pages.driverRoutes')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">View All</a>
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
                        {{-- <form class="mg-b-20"> --}}
                        <form class="mg-b-20" type='GET' action="{{route('driver.pages.driverRoutes')}}">
                            <div class="row gutters-8 items-center">
                                <div class="col-xl-3 col-12 form-group">
                                    <label class="hidden">Name </label>
                                    <input name="name" type="text" placeholder="Search by Route ..." value="{{$request->name}}" class="form-control">
                                </div>
                                <div class="col-xl-3 col-12 form-group">
                                    {{-- <label>Date *</label> --}}
                                    <input name="date" value="" type="text" placeholder="dd-mm-yyyy" value="{{$request->date}}" class="form-control air-datepicker required">
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Route Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data) && count($data) == 0)
                                        <tr>
                                            <td></td>
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                    @foreach ($data as $key=>$job)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$job->route_name}}</td>
                                            <td>{{$job->driver_status == 1 ? 'Running' : ($job->driver_status == 2 ? 'Reached' : 'Not Reached')}}</td>
                                            <td>
                                                {{-- <div class="flex flex-row gap-2">
                                                    <select data-id="{{$job->id}}" name="status" class="select2">
                                                        <option value="">Change Status</option>
                                                        <option {{$job->driver_status == 1 ? 'selected':''}} value="1">Running</option>
                                                        <option {{$job->driver_status == 2 ? 'selected':''}} value="2">Reached</option>
                                                        <option {{$job->driver_status == 0 ? 'selected':''}} value="0">Not Reached</option>
                                                    </select>
                                                </div> --}}
                                                @if($job->driver_status == 1)
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('driver.get.updateDriverStatus', ['sc_route_id' => $job->id,'status'=>2])}}">Reached</a>
                                                @elseif($job->driver_status == 2)
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('driver.get.updateDriverStatus', ['sc_route_id' => $job->id,'status'=>0])}}">Not Reached</a>
                                                @else
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('driver.get.updateDriverStatus', ['sc_route_id' => $job->id,'status'=>1])}}">Start</a>
                                                @endif
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Teacher Table Area End Here -->

@endsection


@section('inner_js')

<script>

    @if(session('success'))
        responseToast("{{session('success')}}",'bg-success');
    @endif

    // $('select[name=status]').on('change',function(){
    //     let data = {};
    //     data['id'] = $(this).attr('data-id');
    //     data['status'] = $(this).val();
    //     callApi('post',"{{route('admin.post.changeStatus')}}",data,ajaxResponseModal);
    // });

    // function submitForm(form){
    //     let data = new FormData($(form)[0]);
    //     callAjaxFormData('post',"{{route('staff.post.createAttendance')}}",data,ajaxResponseModal);
    // }

</script>

@endsection