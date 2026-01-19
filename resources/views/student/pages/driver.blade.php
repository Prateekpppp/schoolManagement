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
                                <a href="{{route('admin.pages.addDriver')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Add Driver</a>
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
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Salary</th>
                                        <th>Joining Date</th>
                                        <th>Driving License</th>
                                        {{-- <th>Document</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data) && count($data) == 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            {{-- <td></td> --}}
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                    @foreach ($data as $key=>$job)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <img src="{{asset('/').$job->photo}}" alt="photo" width="50px" height="50px">
                                            </td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->phone}}</td>
                                            <td>{{$job->gender ? 'Male' : 'Female'}}</td>
                                            <td>{{$job->salary}}</td>
                                            <td>{{$job->joining_date}}</td>
                                            <td>{{$job->driving_license}}</td>
                                            {{-- <td><a href="{{asset('/').$job->other_document}}" download="{{$job->phone}}">Download Document</a></td> --}}
                                            {{-- <td>{{$job->status ? 'Active' : 'Inactive'}}</td> --}}
                                            <td>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.updateDriver', ['id' => $job->id])}}">Edit</a>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.driverDetail', ['id' => $job->id])}}">Details</a>
                                                <a href="javascript:void(0)" data-model="Driver" data-id="{{$job->id}}" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min" href="javascript:void(0)">Remove</a>
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