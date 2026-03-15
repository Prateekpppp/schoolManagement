@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->

                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Generate TC</h3>
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
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>TC No. </label>
                                    <input name="tc_no" type="text" placeholder="" class="form-control required" value="{{isset($data->tc_no) ? $data->tc_no : 'TC_'.substr(time(),5)}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Select Student </label>
                                    <select name="student_id" class="select2 required">
                                        <option value="">Please Select Student *</option>
                                        @foreach($students as $class)
                                            <option value="{{$class->id}}" {{isset($data->student_id) && $data->student_id == $class->id ? 'selected' : ''}}>{{$class->admission_no}} | {{$class->roll_no}} | {{$class->name}} | {{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>TC Application Date *</label>
                                    <input name="application_date" type="text" placeholder="dd-mm-yyyy" class="form-control air-datepicker required" value="{{isset($data) ? $data->application_date : ''}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>TC Issue Date *</label>
                                    <input name="issue_date" type="text" placeholder="dd-mm-yyyy" class="form-control air-datepicker required" value="{{isset($data) ? $data->issue_date : ''}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Start Class </label>
                                    <select name="start_class" class="select2 required">
                                        <option value="">Please Select Class *</option>
                                        @foreach($globalClasses as $class)
                                            <option value="{{$class->id}}" {{isset($data) && $data->start_class == $class->id ? 'selected' : ''}}>{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>End Class </label>
                                    <select name="end_class" class="select2 required">
                                        <option value="">Please Select Class *</option>
                                        @foreach($globalClasses as $class)
                                            <option value="{{$class->id}}" {{isset($data) && $data->end_class == $class->id ? 'selected' : ''}}>{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Wheather Ncc/Scout/Guide *</label>
                                    <select name="ncc" class="select2 required">
                                        <option {{isset($data) && $data->ncc == '0' ? 'selected' : ''}} value="No">No</option>
                                        <option {{isset($data) && $data->ncc == '1' ? 'selected' : ''}} value="Yes">Yes</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Games Played Or Extra Activity *</label>
                                    <select name="game_played" class="select2 required">
                                        <option {{isset($data) && $data->game_played == '0' ? 'selected' : ''}} value="No">No</option>
                                        <option {{isset($data) && $data->game_played == '1' ? 'selected' : ''}} value="Yes">Yes</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Fees Dues if Any  *</label>
                                    <input name="feedue" value="{{isset($data) ? $data->feedue : ''}}" type="text" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Any Conecession  *</label>
                                    <input name="concession" value="{{isset($data) ? $data->concession : ''}}" type="text" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Failed in Previous Classes *</label>
                                    <select name="failed_last_class" class="select2 required">
                                        <option {{isset($data) && $data->failed_last_class == '0' ? 'selected' : ''}} value="No">No</option>
                                        <option {{isset($data) && $data->failed_last_class == '1' ? 'selected' : ''}} value="Yes">Yes</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Last Examintion Taken *</label>
                                    <select name="last_exam" class="select2 changeClass required">
                                        <option value="">Please Select Exam *</option>
                                        {{-- $globalClasses -> $exams --}}
                                        @foreach($globalClasses as $class)
                                            <option value="{{$class->id}}" {{isset($data) && $data->last_exam == $class->id ? 'selected' : ''}}>{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Reason For Leaving *</label>
                                    <input name="reason" value="{{isset($data) ? $data->reason : ''}}" type="text" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>General Conduct/Behaviour *</label>
                                    <input name="behaviour" value="{{isset($data) ? $data->behaviour : ''}}" type="text" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Any Remark </label>
                                    <input name="remark" value="{{isset($data) ? $data->remark : ''}}" type="text" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Nationality </label>
                                    <input name="nationality" value="{{isset($data) ? $data->nationality : ''}}" type="text" class="form-control" value="Indian">
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
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>TC List</h3>
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
                        
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Tc No.</th>
                                        <th>Student</th>
                                        <th>Father's Name</th>
                                        <th>Admission No.</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($tcList) || count($tcList) == 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                    @foreach ($tcList as $key=>$job)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$job->tc_no}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->father_name}}</td>
                                            <td>{{$job->admission_no}}</td>
                                            <td>{{$job->class_name}}</td>
                                            <td>{{$job->section_name}}</td>
                                            <td>{{$job->issue_date}}</td>
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.printTC', ['tc_no'=>$job->tc_no])}}">Print</a>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.tc', ['tc_no'=>$job->tc_no])}}">Edit</a>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min !bg-red-700" data-model="Transfercertificate" href="{{route('admin.post.updateStatus', ['id'=>$job->tc_id, 'status'=>0])}}">Remove</a>
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
                <!-- Add New Teacher Area End Here -->

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createTc')}}",data,ajaxResponseModal);
    }

</script>

@endsection