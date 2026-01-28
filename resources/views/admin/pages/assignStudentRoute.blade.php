@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Route</h3>
                            </div>
                            <div class="">
                                <a href="{{route('admin.pages.assignedStudentRoute')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">View All</a>
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
                                @if(isset($data))
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                @endif
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student </label>
                                    <select name="student_id" class="select2 required">
                                        <option class="" value="">Please Select Student *</option>
                                        @foreach($students as $class)
                                            <option value="{{$class->id}}">{{$class->admission_no}} | {{$class->roll_no}} | {{$class->name}} | {{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Routes </label>
                                    <select name="sc_route_id" class="select2 required">
                                        <option value="">Please Select Routes *</option>
                                        @foreach($routes as $route)
                                            <option {{isset($data) && $data->sc_route_id == $route->id ? 'selected' : ''}} value="{{$route->id}}">{{$route->route_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                
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

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createStudentRoute')}}",data,ajaxResponseModal);
    }

</script>

@endsection