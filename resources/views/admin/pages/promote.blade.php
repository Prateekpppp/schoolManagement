@extends('admin.inner_master')

@section('inner_body')

                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Promote Students</h3>
                            </div>
                            <div class="">
                                <a href="{{route('admin.pages.filterGenerateFee')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">Promote One</a>
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
                        <form class="mg-b-20" type='GET' action="{{route('admin.pages.promote')}}">
                            <div class="row gutters-8 items-center">
                                <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="hidden">Name </label>
                                    <input name="name" value="{{isset($request->name)?$request->name:''}}" type="text" placeholder="Search by Name ..." class="form-control">
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
                                {{-- <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="hidden">Select Month *</label>
                                    <input name="month" value="{{isset($request->month)?$request->month:''}}" type="text" placeholder="Select Month" class="form-control air-datepicker required" required>
                                </div> --}}
                                <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="hidden">Select Month *</label>
                                    <select name="month" class="select2 required">
                                        <option value="">Please Select Month</option>
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
                                <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="hidden">Invoice Type</label>
                                    <select name="invoiceType" class="select2">
                                        <option value="">Please Select Type</option>
                                        <option {{isset($request->invoiceType) && $request->invoiceType == '0'?'selected':''}} value="0">All</option>
                                        <option {{isset($request->invoiceType) && $request->invoiceType == '1'?'selected':''}} value="1">Dues</option>
                                    </select>
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-2 col-12 form-group">
                                    <button class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <form class="mg-b-20">
                            <div class="row gutters-8 items-center">
                                <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="">Total Dues </label>
                                    <input name="name" value="{{isset($totalDueAmount)?$totalDueAmount:''}}" type="text" class="form-control">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-12 form-group">
                                    <label class="">Total Paid </label>
                                    <input name="name" value="{{isset($totalPaidAmount)?$totalPaidAmount:''}}" type="text" class="form-control">
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
                                        <th>S.NO.</th>
                                        <th>Student</th>
                                        <th>Father's Name</th>
                                        <th>Admission No.</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Action</th>
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
                                            <td></td>
                                        </tr>
                                    @else
                                    @foreach ($data as $k=>$job)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input data-value="{{$job->id}}" type="checkbox" name="students[]" class="form-check-input checkOne">
                                                    <label class="form-check-label">Check</label>
                                                </div>
                                            </td>
                                            <td>{{$k+1}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->father_name}}</td>
                                            <td>{{$job->admission_no}}</td>
                                            <td>{{$job->class}}</td>
                                            <td>{{$job->section}}</td>
                                            <td>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.promotionById', ['student_id' => $job->id])}}">Promote</a>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-row gap-2 justify-center py-2">
                            <a href="javascript:void(0)" class="modal-trigger generateIds" >Promote</a>

                        </div>
                    </div>
                </div>
                <!-- Student Table Area End Here -->
                
@endsection


@section('inner_js')

<script>

    // Bulk promotion

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
        
    });

    $('.checkOne').on('click',function(){
        if($(this).is(':checked')){
            data.push($(this).attr('data-value'));

        } else{
            data = data.filter(item => item != $(this).attr('data-value'));
        }
        
    });

    $('.generateIds').on('click',function(e){
        
        $(this).addClass('disabled');
        if(data.length == 0){
            responseToast('Please Select Students', 'bg-warning');
            // $('.closeModel').click();
            $(this).removeClass('disabled');
            return;
        }

        // data = JSON.stringify(data);

        // window.location.href = "{{route('admin.get.print_allInvoice')}}?invoices="+data;
        
        callApi('get',"{{route('admin.get.print_allInvoice')}}",{ids:data,to_class_id:$('select[name=class_id]').val()},ajaxResponseModal);
    });
</script>

@endsection