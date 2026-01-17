@extends('admin.inner_master')

@section('inner_body')

                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Payment History</h3>
                            </div>
                            <div class="">
                                <a href="{{url()->previous()}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">Back</a>
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
                        <form class="mg-b-20" type='GET' action="{{route('admin.pages.studentFilter')}}">
                            <div class="row gutters-8 items-center">
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <label class="hidden">Name </label>
                                    <input name="name" type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="hidden">Class </label>
                                    <select name="class_id" class="select2 changeClass">
                                        <option value="">Please Select Class</option>
                                        @foreach($globalClasses as $class)
                                            <option value="{{$class->id}}">{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="hidden">Section </label>
                                    <select name="section_id" class="select2">
                                        <option class="secAfter" value="">Please Select Section</option>
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
                                        <th>Receipt NO.</th>
                                        <th>Invoice NO.</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Dues</th>
                                        <th>Payment Method</th>
                                        <th>Transaction ID</th>
                                        <th>Date</th>
                                        {{-- <th>Fee</th> --}}
                                        {{-- <th>Paid</th> --}}
                                        {{-- <th>Dues</th> --}}
                                        {{-- <th>Action</th> --}}
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
                                            {{-- <td></td> --}}
                                        </tr>
                                    @else
                                    @foreach ($transactions as $k=>$job)
                                        <tr>
                                            <td>{{$job->receipt_no ?? '--'}}</td>
                                            <td>{{$job->invoice_id ?? '--'}}</td>
                                            <td>{{$job->payable_amount ?? '--'}}</td>
                                            <td>{{$job->transaction_amount ?? '--'}}</td>
                                            <td>{{$job->due_amount ?? '--'}}</td>
                                            <td>{{$job->payment_method ?? '--'}}</td>
                                            <td>{{$job->transaction_id ?? '--'}}</td>
                                            {{-- <td>{{date('M',strtotime($job->created_at))}}</td> --}}
                                            {{-- <td>{{$job->amount}}</td> --}}
                                            {{-- <td>{{$job->paid}}</td> --}}
                                            <td>{{$job->date ?? '--'}}</td>
                                            {{-- <td>{{$job->status ? 'Active' : 'Inactive'}}</td> --}}
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
</script>

@endsection