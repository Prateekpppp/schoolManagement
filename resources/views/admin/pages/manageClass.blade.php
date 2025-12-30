@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Update Class</h3>
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
                            @if(isset($class))
                            <input type="hidden" name="id" value="{{$class->id}}">
                            @endif
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class Name *</label>
                                    <input value="{{(isset($class) && !is_null($class)) ? $class->class_name : ''}}" name="class_name" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Section *</label>
                                    <select name="sections[]" multiple class="select2 required">
                                        <option value="">Please Select Section *</option>
                                        @if(count($classSections) > 0)
                                            @foreach($classSections as $section)
                                                <option value="{{$section->id}}">{{$section->section_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject *</label>
                                    <select name="subject[]" multiple class="select2 required">
                                        <option value="">Please Select Subject *</option>
                                        @if(count($subject) > 0)
                                            @foreach($subject as $section)
                                                <option value="{{$section->id}}">{{$section->subject}}</option>
                                            @endforeach
                                        @endif
                                    </select>
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
                                <h3>Update Sections</h3>
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
                                        <th>Sections</th>
                                        {{-- <th>Sections</th> --}}
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($cSections) || count($cSections) == 0)
                                        <tr>
                                            <td colspan="11" class="text-center">No Data Found</td>
                                        </tr>
                                    @else
                                    @php
                                    $sn1 = 0;
                                    @endphp
                                    @foreach ($cSections as $key=>$job)
                                        <tr>
                                            <td>{{$sn1+1}}</td>
                                            <td>{{$job}}</td>
                                            {{-- <td>{{$key}}</td> --}}
                                            <td data-id="{{$key}}">
                                                <a class_id="{{$class->id}}" section_id="{{$key}}" class="remove_cSection btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min" href="javascript:void(0)">Remove</a>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Update Subjects</h3>
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
                                        <th>Subject</th>
                                        {{-- <th>Sections</th> --}}
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($cSubject) || count($cSubject) == 0)
                                        <tr>
                                            <td colspan="11" class="text-center">No Data Found</td>
                                        </tr>
                                    @else
                                    @php
                                    $sn = 0;
                                    @endphp
                                    @foreach ($cSubject as $key=>$job)
                                        <tr>
                                            <td>{{$sn+1}}</td>
                                            <td>{{$job}}</td>
                                            {{-- <td>{{$key}}</td> --}}
                                            <td data-id="{{$key}}">
                                                <a class_id="{{$class->id}}" subject_id="{{$key}}" class="remove_cSubject btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min" href="javascript:void(0)">Remove</a>
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
        callAjaxFormData('post',"{{route('admin.post.createClass')}}",data,ajaxResponseModal);
    }

    $('.remove_cSection').on('click', function(){
        data = {};
        data['class_id'] = $(this).attr('class_id');
        data['section_id'] = $(this).attr('section_id');
        callApi('post',"{{route('admin.post.remove_cSection')}}",data,ajaxResponseModal);
    });
    
    $('.remove_cSubject').on('click', function(){
        data = {};
        data['class_id'] = $(this).attr('class_id');
        data['subject_id'] = $(this).attr('section_id');
        callApi('post',"{{route('admin.post.remove_cSubject')}}",data,ajaxResponseModal);
    });

</script>

@endsection