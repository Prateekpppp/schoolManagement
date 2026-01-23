@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Staff Salary</h3>
                            </div>
                            {{-- <div>
                                <a href="{{route('admin.pages.salary')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">View All</a>
                            </div> --}}
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
                        <form class="new-added-form">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Staff </label>
                                    <select name="staff_id" class="select2 required">
                                        <option value="">Please Select Staff *</option>
                                        @foreach($staff as $class)
                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Present *</label>
                                    <input name="total_present" value="" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Half Day *</label>
                                    <input name="total_half_day" value="" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Leave *</label>
                                    <input name="total_leave" value="" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Absent *</label>
                                    <input name="total_absent" value="" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Monthly Salary *</label>
                                    <input name="monthly_salary" value="" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Security Deposit *</label>
                                    <input name="security_deposit" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Salary *</label>
                                    <input name="total_salary" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Salary Date *</label>
                                    <input name="salary_date" type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker required">
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit"
                                        class="submitForm btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset"
                                        class="reset_form btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                                    <label class="hidden">Month </label>
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
                                {{-- <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div> --}}
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
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
                                            <td>{{$sn1+=1}}</td>
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
                                                    <a href="{{route('admin.pages.updateSalary', ['id' => $job->id])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Edit</a>
                                                    <a target="_blanck" href="{{route('admin.pages.printSalary', ['id' => $job->id])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Print</a>
                                                    <a data-href="{{route('admin.post.delete')}}" data-id="{{$job->id}}" data-model="Salary" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min" href="javascript:void(0)">Remove</a>

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