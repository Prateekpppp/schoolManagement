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
                        <form class="mg-b-20" type='GET' action="{{route('admin.pages.staffAttendance')}}">
                            <div class="row gutters-8 items-center">
                                <div class="col-lg-3 col-12 form-group">
                                    <label class="hidden">Name </label>
                                    <input name="name" type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-xl-3 col-12 form-group">
                                    {{-- <label>Date *</label> --}}
                                    <input name="date" value="" type="text" placeholder="dd-mm-yyyy" class="form-control air-datepicker required">
                                </div>
                                <div class="col-lg-3 col-12 form-group">
                                    <label class="hidden">Month </label>
                                    <select name="month" class="select2">
                                        <option value="">Please Select Month *</option>
                                        <option {{isset($request->month) && $request->month == '01'?'selected':''}} value="01">Jan</option>
                                        <option {{isset($request->month) && $request->month == '02'?'selected':''}} value="02">Feb</option>
                                        <option {{isset($request->month) && $request->month == '03'?'selected':''}} value="03">Mar</option>
                                        <option {{isset($request->month) && $request->month == '04'?'selected':''}} value="04">Apr</option>
                                        <option {{isset($request->month) && $request->month == '05'?'selected':''}} value="05">May</option>
                                        <option {{isset($request->month) && $request->month == '06'?'selected':''}} value="06">Jun</option>
                                        <option {{isset($request->month) && $request->month == '07'?'selected':''}} value="07">Jul</option>
                                        <option {{isset($request->month) && $request->month == '08'?'selected':''}} value="08">Aug</option>
                                        <option {{isset($request->month) && $request->month == '09'?'selected':''}} value="09">Sep</option>
                                        <option {{isset($request->month) && $request->month == '10'?'selected':''}} value="10">Oct</option>
                                        <option {{isset($request->month) && $request->month == '11'?'selected':''}} value="11">Nov</option>
                                        <option {{isset($request->month) && $request->month == '12'?'selected':''}} value="12">Dec</option>
                                    </select>
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
                                        {{-- <th>S.NO.</th> --}}
                                        <th>Date</th>
                                        <th>Staff</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        {{-- <th>Remark</th> --}}
                                        {{-- <th>Action</th> --}}
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data) || count($data) == 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
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
                                            {{-- <td>{{$sn1+=1}}</td> --}}
                                            <td>{{date('d-m-Y',strtotime($job->date))}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->date}}</td>
                                            <td>{{$job->checkout}}</td>
                                            {{-- <td>{{$job->name}}</td> --}}
                                            {{-- <td>{{!$job->status ? 'Absent' : ($job->status == 1 ? 'Present' : 'Late')}}</td> --}}
                                            {{-- <td>{{$key}}</td> --}}
                                            <td>
                                                @if($currentUser->status < 3)
                                                <div class="flex flex-row gap-2">
                                                    <select data-id="{{$job->id}}" name="status" class="select2">
                                                        <option value="">Change Status</option>
                                                        <option {{$job->status == 0 ? 'selected':''}} value="0">Absent</option>
                                                        <option {{$job->status == 1 ? 'selected':''}} value="1">Present</option>
                                                        <option {{$job->status == 2 ? 'selected':''}} value="2">Late</option>
                                                        <option {{$job->status == 3 ? 'selected':''}} value="3">Half Day</option>
                                                        <option {{$job->status == 4 ? 'selected':''}} value="4">Leave</option>
                                                    </select>
                                                </div>
                                                @else
                                                --
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
                <!-- Add New Teacher Area End Here -->

@endsection


@section('inner_js')

<script>

    $('select[name=status]').on('change',function(){
        let data = {};
        data['id'] = $(this).attr('data-id');
        data['status'] = $(this).val();
        callApi('post',"{{route('admin.post.changeStatus')}}",data,ajaxResponseModal);
    });

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('staff.post.createAttendance')}}",data,ajaxResponseModal);
    }
    

</script>

@endsection