@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Staff Salary List</h3>
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
                        {{-- <form class="mg-b-20" type='GET' action="{{route('admin.pages.inventoryFilter')}}"> --}}
                        <form class="mg-b-20">
                            <div class="row gutters-8 items-center">
                                {{-- <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <label class="hidden">Name </label>
                                    <input name="search" type="text" placeholder="Search by Name ..." class="form-control">
                                </div> --}}
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="">Month </label>
                                    <select name="search" class="select2">
                                        <option value="">Please Select Month *</option>
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="Mar">Mar</option>
                                        <option value="Apr">Apr</option>
                                        <option value="May">May</option>
                                        <option value="Jun">Jun</option>
                                        <option value="Jul">Jul</option>
                                        <option value="Aug">Aug</option>
                                        <option value="Sep">Sep</option>
                                        <option value="Oct">Oct</option>
                                        <option value="Nov">Nov</option>
                                        <option value="Dec">Dec</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-12 form-group">
                                    <label class="">Total Deposit </label>
                                    <input name="" type="text" placeholder="{{$deposit}}" class="form-control" readonly>
                                </div>
                                {{-- <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div> --}}
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Salary Date</th>
                                        <th>Staff</th>
                                        <th>Total Present</th>
                                        <th>Total Half Day</th>
                                        <th>Total Leave</th>
                                        <th>Total Absent</th>
                                        <th>Monthly Salary</th>
                                        <th>Total Salary</th>
                                        <th>Deposit</th>
                                        <th>Action</th>
                                        {{-- <th>Status</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data) || count($data) == 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                    @else
                                    @php
                                    $sn1 = 0;
                                    @endphp
                                    @foreach ($data as $key=>$job)
                                        <tr>
                                            {{-- <td>{{$sn1=+1}}</td> --}}
                                            <td>{{date('d-M-Y',strtotime($job->salary_date))}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->total_present}}</td>
                                            <td>{{$job->total_half_day}}</td>
                                            <td>{{$job->total_leave}}</td>
                                            <td>{{$job->total_absent}}</td>
                                            <td>{{$job->monthly_salary}}</td>
                                            <td>{{$job->total_salary}}</td>
                                            <td>{{$job->security_deposit}}</td>
                                            {{-- <td>{{$key}}</td> --}}
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                    <a target="_blanck" href="{{route('admin.pages.printSalary', ['id' => $job->id])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Print</a>

                                                </div>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Add New Teacher Area End Here -->

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createSalary')}}",data,ajaxResponseModal);
    }
    

</script>

@endsection