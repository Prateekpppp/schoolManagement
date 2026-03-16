@extends('admin.inner_master')

@section('inner_body')

                <!-- Student Details Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            {{-- <div class="item-title">
                                <h3>About Me</h3>
                            </div> --}}
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-info-details">
                            <div class="item-content">
                                <div class="header-inline item-header">
                                    <h3 class="text-dark-medium font-medium">{{$student->name ?? '--'}}</h3>
                                    {{-- <div class="header-elements">
                                        <ul>
                                            <li><a href="#"><i class="far fa-edit"></i></a></li>
                                            <li><a href="#"><i class="fas fa-print"></i></a></li>
                                            <li><a href="#"><i class="fas fa-download"></i></a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                                {{-- <p>Aliquam erat volutpat. Curabiene natis massa sedde lacu stiquen sodale 
                                word moun taiery.Aliquam erat volutpaturabiene natis massa sedde  sodale 
                                word moun taiery.</p> --}}
                                <div class="contanier info-table table-responsive">
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                    <table class="table text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td>Invoice Title:</td>
                                                <td class="font-medium text-dark-medium">Fee Invoice</td>
                                            </tr>
                                            <tr>
                                                <td>Amount:</td>
                                                <td class="font-medium text-dark-medium">{{$data->total_amount - $data->transaction_amount}}</td>
                                            </tr>
                                            <tr>
                                                <td>E-mail:</td>
                                                <td class="font-medium text-dark-medium">{{$student->email ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td class="font-medium text-dark-medium">{{$student->class ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Section:</td>
                                                <td class="font-medium text-dark-medium">{{$student->section ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Roll:</td>
                                                <td class="font-medium text-dark-medium">{{$student->roll_no ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td class="font-medium text-dark-medium">{{$student->address ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td class="font-medium text-dark-medium">{{$student->phone ?? '--'}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Details Area End Here -->

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>
                                    Update Fee Invoice ({{ date('F', mktime(0, 0, 0, $data->month, 1)) }})
                                </h3>
                            </div>
                            <div>
                                <a href="{{route('admin.pages.feeInvoice')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">View All</a>
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
                        <form class="new-added-form">
                            <div class="row">
                                <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}">
                                <input type="hidden" name="month" value="{{ isset($data) ? $data->month : '' }}">
                                <input type="hidden" name="student_id" value="{{ isset($student) ? $student->id : '' }}">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Amount *</label>
                                    <input name="payable" value="{{ isset($data) ? $data->total_amount-$data->transaction_amount : '' }}" type="text" placeholder="" class="form-control required" readonly>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Paying Amount *</label>
                                    <input name="transaction_amount" value="" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Payment Method </label>
                                    <select name="payment_method" class="select2">
                                        <option value="">Please Select Method *</option>
                                        <option value="Cash">Cash</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Cheque">Bank Transfer</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Transaction Id</label>
                                    <input name="transaction_id" value="" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Payment Date *</label>
                                    <input name="date" value="" type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Late Fee Applicable </label>
                                    <select name="late_fee_applicable" class="select2 required late_fee_applicable">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Due Date </label>
                                    <input name="due_date" value="{{ isset($data) ? $data->due_date : '' }}" type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Due Amount *</label>
                                    <input name="payment_due" value="" type="text" placeholder="" class="form-control required" readonly>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group d-none">
                                    <label>Late Fine *</label>
                                    <input class="late_fine" name="late_fine" value="{{$lateFee}}" type="text" placeholder="" class="form-control required" disabled>
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
                <!-- Add New Teacher Area End Here -->
                
                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Generated Fee</h3>
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
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input name="search" type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input name="search" type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input name="search" type="text" placeholder="Search by Class ..." class="form-control">
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button name="search" type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Receipt NO.</th>
                                        {{-- <th>Roll NO.</th> --}}
                                        <th>Amount  </th>
                                        <th>Payment Method</th>
                                        <th>Transaction ID</th>
                                        <th>Date</th>
                                        {{-- <th>Fee</th> --}}
                                        {{-- <th>Paid</th> --}}
                                        {{-- <th>Dues</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($transactions) || count($transactions) == 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                    @foreach ($transactions as $k=>$job)
                                        <tr>
                                            <td>{{$job->receipt_no ?? '--'}}</td>
                                            <td>{{$job->transaction_amount ?? '--'}}</td>
                                            <td>{{$job->payment_method ?? '--'}}</td>
                                            <td>{{$job->transaction_id ?? '--'}}</td>
                                            {{-- <td>{{date('M',strtotime($job->created_at))}}</td> --}}
                                            {{-- <td>{{$job->amount}}</td> --}}
                                            {{-- <td>{{$job->paid}}</td> --}}
                                            <td>{{$job->date ?? '--'}}</td>
                                            {{-- <td>{{$job->status ? 'Active' : 'Inactive'}}</td> --}}
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                    <a data-href="{{route('admin.post.delete')}}" data-id="{{$job->id}}" data-model="Transaction" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min" href="javascript:void(0)">Remove</a>
                                                    <a target="_blank" href="{{route('admin.pages.print_receipt',['id'=>$job->id])}}" data-id="{{$job->id}}" class="btn fw-btn-fill btn-gradient-yellow" href="javascript:void(0)">Print</a>

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

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.manageFeeInvoice')}}",data,ajaxResponseModal);
    }
    

    $('.late_fee_applicable').on('change', function(e){
        if($(this).val() == '1'){
            $('.late_fine').prop('disabled', false);
            $('.late_fine').prop('readonly', true);
            $('.late_fine').parent().removeClass('d-none');
            // $('input[name="payment_due"]').val(due_amount + late_fine);
        } else{
            $('.late_fine').prop('disabled', true);
            $('.late_fine').prop('readonly', true);
            $('.late_fine').parent().addClass('d-none');
            // $('input[name="payment_due"]').val(due_amount);
        }
    });

    $('input[name="transaction_amount"]').on('input', function(){
        let paying_amount = parseFloat($(this).val()) || 0;
        let due_amount = parseFloat($('input[name="payable"]').val()) || 0;
        due_amount = due_amount - paying_amount;
        
        $('input[name="payment_due"]').val(due_amount);
    })

</script>

@endsection