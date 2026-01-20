@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Attendance</h3>
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

                        @if($currentUser->status > 2)
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                {{-- <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <label class="hidden">Date </label>
                                    <input name="search" type="text" placeholder="Search by Date ..." class="form-control">
                                </div> --}}

                                <input type="hidden" name="date" value="{{now()}}">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="">Make Attendance </label>
                                    <select name="status" class="select2">
                                        <option value="0">Absent</option>
                                        <option value="1">Present</option>
                                    </select>
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group self-end">
                                    <button class="submitForm fw-btn-fill btn-gradient-yellow">Submit</button>
                                </div>
                            </div>
                        </form>
                        @endif
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Date</th>
                                        <th>Staff</th>
                                        <th>Salary</th>
                                        {{-- <th>Action</th> --}}
                                        {{-- <th>Status</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data) || count($data) == 0)
                                        <tr>
                                            <td></td>
                                            {{-- <td></td> --}}
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                    @else
                                    @php
                                    $sn1 = 0;
                                    @endphp
                                    @foreach ($data as $key=>$job)
                                        <tr>
                                            <td>{{$sn1=+1}}</td>
                                            <td>{{$job->date}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->status ? $job->monthly_salary/30 : 0}}</td>
                                            {{-- <td>{{$key}}</td> --}}
                                            {{-- <td>
                                                <div class="flex flex-row gap-2">
                                                    <a target="_blanck" href="{{route('admin.pages.printSalary', ['id' => $job->id])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Print</a>

                                                </div>
                                            </td> --}}
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
        callAjaxFormData('post',"{{route('staff.post.createAttendance')}}",data,ajaxResponseModal);
    }
    

</script>

@endsection