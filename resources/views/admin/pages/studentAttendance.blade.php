@php
// dd($request->class_id);
@endphp
@extends('admin.inner_master')

@section('inner_body')
                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Students Data</h3>
                            </div>
                            {{-- <div class="">
                                <a href="{{route('admin.pages.feeInvoice')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">View Invoices</a>
                            </div> --}}
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <form class="mg-b-20" type='GET' action="{{route('admin.pages.studentAttendance')}}">
                            <div class="row gutters-8 items-center">
                                <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="hidden">Name </label>
                                    <input name="name" type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="hidden">Class </label>
                                    <select name="class_id" class="select2 changeClass">
                                        <option value="">Please Select Class</option>
                                        @foreach($globalClasses as $class)
                                            <option {{isset($request->class_id) && $request->class_id == $class->id?'selected':''}} value="{{$class->id}}">{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="hidden">Section </label>
                                    <select name="section_id" class="select2">
                                        <option class="secAfter" value="">Please Select Section</option>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="hidden">Select Date *</label>
                                    <input name="date" value="{{isset($request->date)?$request->date:''}}" type="text" placeholder="Select Date" class="form-control air-datepicker required" required>
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-2 col-12 form-group">
                                    <button class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Roll No.</th>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAllPresent checkAll" data-value="1">
                                                <label class="form-check-label">Present</label>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAllAbsent checkAll" data-value="0">
                                                <label class="form-check-label">Absent</label>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data))
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                    @else
                                    @foreach ($data as $k=>$job)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            {{-- <td>{{$job->admission_no}}</td> --}}
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->class}}</td>
                                            <td>{{$job->section}}</td>
                                            <td>{{$job->roll_no}}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input name="status_{{$job->id}}" value="1" class="form-check-input checkOne" data-student_id="{{$job->id}}" type="radio" role="switch" id="switch1" {{$job->attendStatus ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="switch1">P</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input name="status_{{$job->id}}" value="0" class="form-check-input checkOne" data-student_id="{{$job->id}}" type="radio" role="switch" id="switchCheckDefault" {{!isset($job->attendStatus)  ? '' : ($job->attendStatus ? '' : 'checked')}}>
                                                    <label class="form-check-label" for="switchCheckDefault">A</label>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="flex flex-row gap-2 justify-center py-2">
                            {{-- <button type="button" class="modal-trigger" data-toggle="modal"
                                data-target="#standard-modal">
                                Lunch Live Demo
                            </button> --}}
                            <a href="javascript:void(0)" class="modal-trigger submitAttendance" >Submit</a>

                        </div>

                    </div>
                </div>
                <!-- Student Table Area End Here -->
                
                
@endsection

@section('inner_js')

<script>
    let data = {};

    $('.checkAll').on('click', function(){
        data = {};
        $('.checkAll').prop('checked',false);
        $(this).prop('checked',true);
        let val = $(this).attr('data-value');
        let allpresentButton = $(`input[type=radio][value=${val}]`);
        
        // allpresentButton.prop('checked',true);
        $(allpresentButton).each(function(i,j){
            $(this).prop('checked',true);
            student_id = $(this).attr('data-student_id');
            status = $(this).attr('value');
            
            data[student_id] = status;
        });
        
    });

    $('.checkOne').on('click',function(){
        student_id = $(this).attr('data-student_id');
        status = $(this).attr('value');

        data[student_id] = status;

        console.log('data--',data);
        
    });

    $('.submitAttendance').on('click',function(e){
        
        $(this).addClass('disabled');
        if(Object.keys(data).length == 0){
            responseToast('Please Mark Attendance', 'bg-warning');
            // $('.closeModel').click();
            $(this).removeClass('disabled');
            return;
        }
        
        callApi('post',"{{route('admin.post.createStudentAttendance')}}",{data:data,date:$('input[name=date]').val()},ajaxResponseModal);
    });
    
    function submitForm(form){
        let data = new FormData($(form)[0]);
        // data['invoice_date'] = $('input[name=month]').val();
        console.log('data--',data);
        
        callAjaxFormData('post',"{{route('admin.post.assignFee')}}",data,ajaxResponseModal);
    }
</script>

@endsection