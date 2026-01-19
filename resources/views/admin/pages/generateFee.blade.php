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
                            <div class="">
                                <a href="{{route('admin.pages.feeInvoice')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">View Invoices</a>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <form class="mg-b-20" type='GET' action="{{route('admin.pages.filterGenerateFee')}}">
                            <div class="row gutters-8 items-center">
                                <div class="col-4-xxxl col-xl-4 col-lg-4 col-12 form-group">
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
                                    <label class="hidden">Select Month *</label>
                                    <input name="month" value="{{isset($request->month)?$request->month:''}}" type="text" placeholder="Select Month" class="form-control air-datepicker required" required>
                                </div>
                                {{-- <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="hidden">Select Month *</label>
                                    <select name="month" class="select2">
                                        <option value="">Please Select Month</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select> --}}
                                {{-- </div> --}}
                                <div class="col-1-xxxl col-xl-2 col-lg-2 col-12 form-group">
                                    <button class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">All</label>
                                            </div>
                                        </th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Parents</th>
                                        <th>Date Of Birth</th>
                                        <th>City</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        {{-- <th></th> --}}
                                        {{-- <th>Address</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($students))
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
                                    @foreach ($students as $k=>$job)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input data-value="{{$job->id}}" type="checkbox" name="students[]" class="form-check-input checkOne">
                                                    <label class="form-check-label">Check</label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{asset('/').$job->photo}}" alt="photo" width="50px" height="50px">
                                            </td>
                                            {{-- <td>{{$job->admission_no}}</td> --}}
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->gender ? 'Male' : 'Female'}}</td>
                                            <td>{{$job->class}}</td>
                                            <td>{{$job->section}}</td>
                                            <td>{{$job->father_name}}</td>
                                            <td>{{$job->dob}}</td>
                                            <td>{{$job->city}}</td>
                                            <td>{{$job->phone}}</td>
                                            <td>{{$job->parent_email}}</td>
                                            {{-- <td>
                                                <div class="flex flex-row gap-2">
                                                    <a href="{{route('admin.pages.manageClass',$job->id)}}" class="btn fw-btn-fill btn-gradient-yellow w-25">Edit</a>
                                                    <a href="javascript:void(0)" data-model="Classes" data-id="{{$job->id}}" data-href="{{route('admin.post.delete')}}" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min">Delete</a>

                                                </div>
                                            </td> --}}
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
                            <a href="javascript:void(0)" class="modal-trigger generateFee" >Generate</a>

                        </div>

                    </div>
                </div>
                <!-- Student Table Area End Here -->
                
                
@endsection

@section('inner_js')

<script>
    let data = [];

    $('.checkAll').on('click', function(){
        data = [];
        console.log('check status',$('.checkAll').is(':checked'));
        
        let $checkboxes = $(this).parents('table').find('tbody').find('input[type=checkbox]');
        // $checkboxes.prop('checked', $('.checkAll').is(':checked'));
        

        if($(this).is(':checked')){
            $(this).parents('.table').find('.checkOne').prop('checked', this.checked);
            $checkboxes.map(function(){
                data.push($(this).attr('data-value'));
            });

        } else{
            data = [];
        }

        console.log('data--',data);
        
    });

    $('.checkOne').on('click',function(){
        if($(this).is(':checked')){
            data.push($(this).attr('data-value'));

        } else{
            data = data.filter(item => item != $(this).attr('data-value'));
        }
        console.log('data--',data);
        
    });

    $('.generateFee').on('click',function(e){
        
        let month = $('input[name=month]').val();
        $(this).addClass('disabled');
        if(data.length == 0){
            responseToast('Please Select Student', 'bg-warning');
            // $('.closeModel').click();
            $(this).removeClass('disabled');
            return;
        }
        // $('#standard-modal').modal('show');
        // $('input[name=students]').val(data);
        callApi('post',"{{route('admin.post.genrateFeeInvoice')}}",{students:data,month:month},ajaxResponseModal);
    });
    
    function submitForm(form){
        let data = new FormData($(form)[0]);
        console.log('data--',data);
        
        callAjaxFormData('post',"{{route('admin.post.assignFee')}}",data,ajaxResponseModal);
    }
</script>

@endsection