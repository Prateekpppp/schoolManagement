@extends('admin.inner_master')

@section('admin_head')
<style>
    .single-info-details .item-content .info-table .table tr td {
        padding: 3px;
    }
</style>
@endsection
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
                        <div class="single-info-details row">
                            <div class="item-img flex flex-col justify-center items-center gap-3 col-md-4">
                                <img src="{{asset('/')}}{{$student->photo ?? '--'}}" alt="student" width="300px">
                                <div class="flex flex-row gap-3 justify-center items-center flex-wrap">
                                    @if($studentFeeInvoice)
                                    <a href="{{route('admin.pages.updateFeeInvoice',['id'=>$studentFeeInvoice->id])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min !bg-red-500" href="javascript:void(0)"> <i class="fa fa-credit-card"></i> Pay Fee</a>
                                    
                                    <a href="{{route('admin.pages.feeInvoice',['student_id'=>$student->id])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min !bg-blue-500" href="javascript:void(0)"> <i class="fa fa-calculator"></i> View Dues</a>
                                    @endif
                                    <a href="{{route('admin.pages.paymentHistory',['id'=>$student->id])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min !bg-green-500" href="javascript:void(0)"> <i class="fa fa-clock"></i> Payment History</a>
                                    <a href="{{asset('/').$student->qrcode}}" download class="btn fw-btn-fill btn-gradient-yellow !max-w-min !bg-purple-500" href="javascript:void(0)"> <i class="fa fa-qrcode"></i> Download QR</a>
                                    <a href="{{route('admin.pages.studentAttendance',['id'=>$student->id,'date'=>date('m')])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)"> <i class="fa fa-user"></i> Attendance Report</a>
                                    <a target="_blanck" href="{{route('admin.pages.studentIdcard',['id'=>$student->id])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)"> <i class="fa fa-user"></i> ID Card</a>
                                </div>
                            </div>
                            <div class="item-content col-md-6">
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
                                <div class="info-table table-responsive">
                                    <table class="table text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td class="font-medium text-dark-medium">{{$student->name ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Gender:</td>
                                                <td class="font-medium text-dark-medium">{{$student->gender ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Father Name:</td>
                                                <td class="font-medium text-dark-medium">{{$student->father_name ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Mother Name:</td>
                                                <td class="font-medium text-dark-medium">{{$student->mother_name ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Date Of Birth:</td>
                                                <td class="font-medium text-dark-medium">{{$student->dob ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Religion:</td>
                                                <td class="font-medium text-dark-medium">{{$student->religion ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Father Occupation:</td>
                                                <td class="font-medium text-dark-medium">{{$student->father_occupation ?? '--'}}</td>
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
                                                <td>Front Id:</td>
                                                <td class="font-medium text-dark-medium">
                                                    <a href="{{asset('/').$student->id_proof_front}}" target="_blank" rel="noopener noreferrer">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Back Id:</td>
                                                <td class="font-medium text-dark-medium">
                                                    <a href="{{asset('/').$student->id_proof_back}}" target="_blank" rel="noopener noreferrer">View</a>
                                                </td>
                                            </tr>
                                            @if($student->other_document)
                                            <tr>
                                                <td>Document:</td>
                                                <td class="font-medium text-dark-medium">
                                                    <a href="{{asset('/').$student->other_document}}" target="_blank" rel="noopener noreferrer">View</a>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Details Area End Here -->
                
@endsection

@section('inner_js')

<script>
</script>

@endsection