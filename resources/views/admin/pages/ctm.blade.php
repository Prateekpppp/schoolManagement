@extends('admin.inner_master')

@section('admin_head')

<link rel="stylesheet" href="{{ asset('css') }}/summernote-bs5.min.css">

@endsection

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->

                <div class="card height-auto">
                    <div class="card-body"> 
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Generate Custom Certificate</h3>
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
                                    <label>Ctm No. </label>
                                    <input name="ctm_no" type="text" placeholder="" class="form-control required" value="{{isset($data->ctm_no) ? $data->ctm_no : 'CTM_'.substr(time(),5)}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Title </label>
                                    <input name="title" type="text" placeholder="" class="form-control required" value="{{isset($data) ? $data->title : ''}}">
                                </div>
                                {{-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Name </label>
                                    <input name="name" type="text" placeholder="" class="form-control required" value="{{isset($data) ? $data->name : ''}}">
                                </div> --}}
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Issue Date *</label>
                                    <input name="issue_date" type="text" placeholder="dd-mm-yyyy" class="form-control air-datepicker required" value="{{isset($data) ? $data->issue_date : ''}}">
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
                                <div class="col-xl-6 col-lg-6 col-12 form-group mb-5 pb-5">
                                    <label>Description </label>
                                    <textarea id="" name="description" type="text" placeholder="" class="form-control required">{{isset($data) ? $data->description : ''}}</textarea>
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
                                <h3>Certificates</h3>
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
                                        <th>Mg No.</th>
                                        <th>Student</th>
                                        <th>Father's Name</th>
                                        <th>Admission No.</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($tcList) || count($tcList) == 0)
                                        <tr>
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
                                            <td>{{$job->ctm_no}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->father_name}}</td>
                                            <td>{{$job->admission_no}}</td>
                                            <td>{{$job->class_name}}</td>
                                            <td>{{$job->section_name}}</td>
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.printCtm', ['ctm_no'=>$job->ctm_no])}}">Print</a>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.ev', ['ctm_no'=>$job->ctm_no])}}">Edit</a>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min !bg-red-700" data-model="CustomCertificate" href="{{route('admin.post.updateStatus', ['id'=>$job->ctm_id, 'status'=>0])}}">Remove</a>
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

    <script src="{{ asset('js') }}/summernote-bs5.min.js"></script>
<script>

    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: "Write your content here",
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createCtm')}}",data,ajaxResponseModal);
    }

</script>

@endsection