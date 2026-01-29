@extends('admin.inner_master')

@section('inner_body')

                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Fee Invoice</h3>
                            </div>
                            <div class="">
                                <a href="{{route('admin.pages.filterGenerateFee')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">Generate Fee</a>
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
                        <form class="mg-b-20" type='GET' action="{{route('admin.pages.feeInvoice')}}">
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
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Student</th>
                                        <th>Father's Name</th>
                                        <th>Admission No.</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Invoice Date</th>
                                        <th>Month</th>
                                        <th>Paid</th>
                                        <th>Dues</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($fee) || count($fee) == 0)
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
                                            <td></td>
                                        </tr>
                                    @else
                                    @foreach ($fee as $k=>$job)
                                        <tr>
                                            <td>{{$k+=1}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->father_name}}</td>
                                            <td>{{$job->admission_no}}</td>
                                            <td>{{$job->class}}</td>
                                            <td>{{$job->section}}</td>
                                            <td>{{$job->invoice_date}}</td>
                                            <td>{{date('F', mktime(0, 0, 0, $job->month, 1))}}</td>
                                            {{-- <td>{{date('M',strtotime($job->created_at))}}</td> --}}
                                            {{-- <td>{{$job->total_amount}}</td> --}}
                                            <td>{{$job->total_transaction_amount}}</td>
                                            <td>{{$job->total_amount-$job->total_transaction_amount}}</td>
        {{-- // select transaction amount from transaction where feeinvoice_id = current invoice --}}
                                            <td>
                                                <b class='{{$job->total_amount == $job->total_transaction_amount ? "text-green-700" : 'text-red-700'}}'>
                                                {{$job->total_amount == $job->total_transaction_amount ? "Paid" : 'Partially Paid'}}
                                                </b>
                                            </td>
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                    <a data-href="{{route('admin.post.delete')}}" data-id="{{$job->id}}" data-model="FeeInvoice" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min" href="javascript:void(0)">Remove</a>
                                                    <a target="_blank" href="{{route('admin.pages.print_invoice',['id'=>$job->id,'month'=>$job->month])}}" data-id="{{$job->id}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">Print</a>
                                                    <a href="{{route('admin.pages.updateFeeInvoice',['id'=>$job->id])}}" class="btn fw-btn-fill btn-gradient-yellow !bg-green-600 collectFee !max-w-min">Collect</a>

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
                <!-- Student Table Area End Here -->
                
                <!-- Modal -->
                <div class="modal fade" id="standard-modal" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Invoice</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="new-added-form">
                                    <input type="hidden" name="id" value="">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 form-group">
                                            <label>Fee Paid *</label>
                                            <input value="" name="paid" type="text" placeholder="" class="form-control required">
                                        </div>
                                        <div class="col-lg-6 col-12 form-group">
                                            <label>Collection Date *</label>
                                            <input value="" name="date" type="text" placeholder="dd/mm/yyyy" class="form-control  air-datepicker required">
                                        </div>
                                        <div class="col-lg-6 col-12 form-group">
                                            <label>Payment Method </label>
                                            <select name="payment_method" class="select2">
                                                <option value="">Please Select Method *</option>
                                                <option value="Cash">Cash</option>
                                                <option value="UPI">UPI</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Cheque">Bank Transfer</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-12 form-group">
                                            <label>Transaction ID </label>
                                            <input value="" name="transaction_id" type="text" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="closeModel footer-btn bg-dark-low"
                                    data-dismiss="modal">Close</button>
                                <button type="button" class="submitForm footer-btn bg-linkedin">Collect Fee</button>
                            </div>
                        </form>
                    </div>
                </div>
@endsection


@section('inner_js')

<script>
    $('.collectFee').on('click',function(){
        $('input[name=id]').val($(this).attr('data-id'));
    });

    function submitForm(form){
        let data = new FormData($(form)[0]);
        
        callAjaxFormData('post',"{{route('admin.post.collectFee')}}",data,ajaxResponseModal);
    }

</script>

@endsection