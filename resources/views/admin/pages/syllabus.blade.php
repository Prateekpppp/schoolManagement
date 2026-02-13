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
                                <h3>Update Syllabus</h3>
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
                                <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Select Class </label>
                                    <select name="class" class="select2 changeClass required">
                                        <option value="">Please Select Class *</option>
                                        @foreach($globalClasses as $class)
                                            <option value="{{$class->id}}" {{isset($data->class) && $data->class == $class->id ? 'selected' : ''}}>{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject </label>
                                    <select name="subject" class="select2 required">
                                        <option class="subAfter" value="">Please Subject Class *</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Topic *</label>
                                    <input name="topic" type="text" placeholder="" class="form-control required" value="{{isset($data) ? $data->topic : ''}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date *</label>
                                    <input name="date" type="text" placeholder="dd-mm-yyyy" class="form-control air-datepicker required" value="{{isset($data) ? $data->date : ''}}">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group mb-5 pb-5">
                                    <label>Description </label>
                                    <textarea id="summernote" name="description" type="text" placeholder="" class="form-control required">{{isset($data) ? $data->description : ''}}</textarea>
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
                                <h3>Syllabus</h3>
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
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Topic</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Status</th>
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
                                            <td>{{$job->class_name}}</td>
                                            <td>{{$job->subject_name}}</td>
                                            <td>{{$job->topic}}</td>
                                            <td>{{$job->date}}</td>
                                            <td>{{$job->description}}</td>
                                            {{-- <td>{{!$job->status ? 'Absent' : ($job->status == 1 ? 'Present' : 'Late')}}</td> --}}
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                    <select data-model="Syllabus" data-id="{{$job->id}}" name="status" class="select2">
                                                        <option value="">Change Status</option>
                                                        <option {{$job->status == 0 ? 'selected':''}} value="0">Pending</option>
                                                        <option {{$job->status == 1 ? 'selected':''}} value="1">Ongoing</option>
                                                        <option {{$job->status == 2 ? 'selected':''}} value="2">Completed</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                {{-- <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.printCtm', ['id'=>$job->id])}}">View</a> --}}
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.syllabus', ['id'=>$job->id])}}">Edit</a>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min !bg-red-700" data-model="Syllabus" href="{{route('admin.post.updateStatus', ['id'=>$job->id, 'status'=>0])}}">Remove</a>
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

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createSyllabus')}}",data,ajaxResponseModal);
    }

    $('select[name=status]').on('change',function(){
        let data = {};
        data['id'] = $(this).attr('data-id');
        data['status'] = $(this).val();
        data['model'] = $(this).attr('data-model');
        callApi('post',"{{route('admin.post.updateStatus')}}",data,ajaxResponseModal);
    });
</script>

@endsection