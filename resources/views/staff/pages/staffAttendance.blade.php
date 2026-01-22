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
                                <input type="hidden" name="location" value="">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="">Make Attendance </label>
                                    <select name="status" class="select2" readonly>
                                        {{-- <option value="0">Absent</option> --}}
                                        <option value="1" selected>Present</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-12 form-group self-end">
                                    <button class="submitForm fw-btn-fill btn-gradient-yellow">Mark Present</button>
                                </div>
                                <div class="col-md-1 col-12 form-group self-end">
                                    <button class="fw-btn-fill btn-gradient-yellow">{{$present}}</button>
                                </div>
                                <div class="col-md-1 col-12 form-group self-end">
                                    <button class="fw-btn-fill btn-gradient-yellow">{{$absent}}</button>
                                </div>
                                <div class="col-md-1 col-12 form-group self-end">
                                    <button class="fw-btn-fill btn-gradient-yellow">{{$late}}</button>
                                </div>
                            </div>
                        </form>
                        @endif
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        {{-- <th>S.NO.</th> --}}
                                        <th>Date</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        {{-- <th>Staff</th> --}}
                                        <th>Remark</th>
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
                                            {{-- <td>{{$sn1+=1}}</td> --}}
                                            <td>{{date('d-m-Y',strtotime($job->date))}}</td>
                                            <td>{{$job->date}}</td>
                                            <td>{{$job->date}}</td>
                                            {{-- <td>{{$job->name}}</td> --}}
                                            <td>{{!$job->status ? 'Absent' : ($job->status == 1 ? 'Present' : 'Late')}}</td>
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

    let locFlag = localStorage.getItem('locFlag');
    $(document).ready(function(){
        // alert(locFlag);
        locFlag = localStorage.getItem('locFlag');
        navigator.geolocation.getCurrentPosition(success, error);
    });

    $('select[name=status]').on('change',function(){
        navigator.geolocation.getCurrentPosition(success, error);
    });

    function success(pos){
        // alert('tre');
        locFlag = true;
        localStorage.setItem('locFlag', locFlag);
        $('input[name=location]').val(JSON.stringify(pos.coords));
    }

    function error(){
        // alert('false');
        locFlag = false;
        responseToast('please allow location access','bg-warning');
        return false;
    }

    function submitForm(form){
        if(!locFlag){
            responseToast('please allow location access','bg-warning');
            $('.submitForm').removeClass('disabled');
            return false;
        }
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('staff.post.createAttendance')}}",data,ajaxResponseModal);
    }
    

</script>

@endsection