@extends('admin.inner_master')

@section('inner_body')

                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Driver Data</h3>
                            </div>
                            <div>
                                <a href="{{route('admin.pages.assignRouteVehicle')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Assign Driver Route</a>
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
                        <form class="mg-b-20">
                        {{-- <form class="mg-b-20" type='GET' action="{{route('admin.pages.driverFilter')}}"> --}}
                            <div class="row gutters-8 items-center">
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <label class="hidden">Name </label>
                                    <input name="search" type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <a href="javascript:void(0)" class="fw-btn-fill btn-gradient-yellow">SEARCH</a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Route Name</th>
                                        <th>Route Fare</th>
                                        <th>Driver</th>
                                        <th>Vehicle No.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data) && count($data) == 0)
                                        <tr>
                                            <td></td>
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
                                            <td>{{$job->route_fare}}</td>
                                            <td>{{$job->driver_name}}</td>
                                            <td>{{$job->vehicle_no}}</td>
                                            <td>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.updateAssignRouteVehicle', ['id' => $job->id])}}">Edit</a>
                                                {{-- <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.driverDetail', ['id' => $job->id])}}">Details</a> --}}
                                                <a href="javascript:void(0)" data-model="DriverRoute" data-id="{{$job->id}}" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min" href="javascript:void(0)">Remove</a>
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

</script>

@endsection