@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->

                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Generate CC</h3>
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
                                    <label>CC No. </label>
                                    <input name="cc_no" type="text" placeholder="" class="form-control required" value="{{isset($data->cc_no) ? $data->cc_no : 'CC_'.substr(time(),5)}}">
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
                                    <label>CC Application Date *</label>
                                    <input name="application_date" type="text" placeholder="dd-mm-yyyy" class="form-control air-datepicker required" value="{{isset($data) ? $data->application_date : ''}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>CC Issue Date *</label>
                                    <input name="issue_date" type="text" placeholder="dd-mm-yyyy" class="form-control air-datepicker required" value="{{isset($data) ? $data->issue_date : ''}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Character  *</label>
                                    <input name="character" value="{{isset($data) ? $data->character : ''}}" type="text" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>From *</label>
                                    <input name="from_date" type="text" placeholder="dd-mm-yyyy" class="form-control air-datepicker required" value="{{isset($data) ? $data->from_date : ''}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>To *</label>
                                    <input name="to_date" type="text" placeholder="dd-mm-yyyy" class="form-control air-datepicker required" value="{{isset($data) ? $data->to_date : ''}}">
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
                                <h3>CC List</h3>
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
                                        <th>Cc No.</th>
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
                                            <td>{{$job->cc_no}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->father_name}}</td>
                                            <td>{{$job->admission_no}}</td>
                                            <td>{{$job->class_name}}</td>
                                            <td>{{$job->section_name}}</td>
                                            <td>{{$job->issue_date}}</td>
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.printCc', ['cc_no'=>$job->cc_no])}}">Print</a>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.cc', ['cc_no'=>$job->cc_no])}}">Edit</a>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min !bg-red-700" data-model="Charactercertificate" href="{{route('admin.post.updateStatus', ['id'=>$job->cc_id, 'status'=>0])}}">Remove</a>
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
        callAjaxFormData('post',"{{route('admin.post.createCc')}}",data,ajaxResponseModal);
    }

</script>

@endsection