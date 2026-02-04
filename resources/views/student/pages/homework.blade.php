@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Homework Area Start Here -->
                
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Homework</h3>
                            </div>
                        </div>
                        <form class="mg-b-20" type='GET' action="{{route('student.pages.homeworkFilter')}}">
                            <div class="row gutters-8 items-center">
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <label class="hidden">Name </label>
                                    <input name="name" type="text" placeholder="Search by Name ..." class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="hidden">Class </label>
                                    <select name="class_id" class="select2 changeClass required">
                                        <option value="">Please Select Class</option>
                                        @foreach($globalClasses as $class)
                                            <option value="{{$class->id}}">{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="hidden">Section </label>
                                    <select name="section_id" class="select2 required">
                                        <option class="secAfter" value="">Please Select Section</option>
                                    </select>
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button class="submitFilterForm fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Title</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Date</th>
                                        <th>Document</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data) || count($data) == 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                    @php
                                    $sn1 = 0;
                                    @endphp
                                    @foreach ($data as $key=>$job)
                                        <tr>
                                            <td>{{$sn1=+1}}</td>
                                            <td>{{$job->title}}</td>
                                            <td>{{$job->class}}</td>
                                            <td>{{$job->section}}</td>
                                            <td>{{$job->date}}</td>
                                            <td>
                                                @if($job->upload)
                                                <a href="{{asset('/').$job->upload}}" download>View</a>
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Add New Homework Area End Here -->

@endsection


@section('inner_js')

<script>

    function submitFilterForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('get',"{{route('student.pages.homeworkFilter')}}",data,ajaxResponseModal);
    }

    // $('.remove_feeHead').on('click', function(){
    //     data = {};
    //     data['class_id'] = $(this).attr('class_id');
    //     data['section_id'] = $(this).attr('section_id');
    //     callApi('post',"{{route('admin.post.remove_cSection')}}",data,ajaxResponseModal);
    // });
    

</script>

@endsection