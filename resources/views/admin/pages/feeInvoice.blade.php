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
                                        <th>S.NO.</th>
                                        {{-- <th>Roll NO.</th> --}}
                                        <th>Student</th>
                                        <th>Father's Name</th>
                                        <th>Admission No.</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        {{-- <th>Invoice No.</th> --}}
                                        <th>Month</th>
                                        {{-- <th>Payable</th> --}}
                                        <th>Paid</th>
                                        <th>Dues</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($fee) || count($fee) == 0)
                                        <tr>
                                            <td colspan="11" class="text-center">No Data Found</td>
                                        </tr>
                                    @else
                                    @foreach ($fee as $k=>$job)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->father_name}}</td>
                                            <td>{{$job->admission_no}}</td>
                                            <td>{{$job->class}}</td>
                                            <td>{{$job->section}}</td>
                                            <td>{{date('F', mktime(0, 0, 0, $job->month, 1))}}</td>
                                            {{-- <td>{{date('M',strtotime($job->created_at))}}</td> --}}
                                            {{-- <td>{{$job->total_amount}}</td> --}}
                                            <td>{{$job->transaction_amount}}</td>
                                            <td>{{$job->total_amount-$job->transaction_amount}}</td>
        {{-- // select transaction amount from transaction where feeinvoice_id = current invoice --}}
                                            <td>{{$job->total_amount == $job->transaction_amount ? 'Paid' : 'Partially Paid'}}</td>
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