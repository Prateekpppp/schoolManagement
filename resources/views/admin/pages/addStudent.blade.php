@extends('admin.inner_master')

@section('inner_body')

    <!-- Admit Form Area Start Here -->

    <form>

        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Add Student</h3>
                    </div>
                    <div class="">
                        <a href="{{route('admin.pages.students')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">View All</a>
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
                <div class="new-added-form">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Admission Number *</label>
                            <input name="admission_no" type="text" placeholder="" class="form-control required uppercase">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Name *</label>
                            <input name="name" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Date Of Birth *</label>
                            <input name="dob" type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker required"
                                data-position='bottom right'>
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Gender *</label>
                            <select name="gender" class="select2 required">
                                <option value="">Please Select Gender *</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Others</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Religion *</label>
                            <select name="religion" class="select2 required">
                                <option value="">Please Select Religion *</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Islam">Islam</option>
                                <option value="Christian">Christian</option>
                                <option value="Buddish">Buddish</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Blood Group </label>
                            <select name="blood_group" class="select2">
                                <option value="">Please Select Group *</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Caste *</label>
                            <select name="caste" class="select2 required">
                                <option value="">Please Select Group *</option>
                                <option value="General" selected>General</option>
                                <option value="OBC">OBC</option>
                                <option value="ST/SC">ST/SC</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>City *</label>
                            <input name="city" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>State *</label>
                            <input name="state" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Address *</label>
                            <input name="address" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Phone *</label>
                            <input name="phone" minlength="10" maxlength="10" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Back Dues *</label>
                            <input name="back_dues" type="text" placeholder="" class="form-control">
                        </div>
                        {{-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>E-Mail *</label>
                            <input name="email" type="email" placeholder="" class="form-control required">
                        </div> --}}
                        {{-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Password *</label>
                            <input name="password" type="password" placeholder="" class="form-control required">
                            <div class="float-right passwordType"> <i class="fa fa-eye-slash"></i> </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Class Details</h3>
                    </div>
                </div>
                <div class="new-added-form">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Class </label>
                            <select name="class" class="select2 changeClass required">
                                <option value="">Please Select Class *</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->class}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Section </label>
                            <select name="section" class="select2 required">
                                <option class="secAfter" value="">Please Select Section *</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Roll Number *</label>
                            <input name="roll_no" type="text" placeholder="" class="form-control required">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Sibling Details</h3>
                    </div>
                </div>
                <div class="new-added-form">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Sibling </label>
                            <select name="enrollment_no" class="select2">
                                <option class="" value="">Please Select Student *</option>
                                @foreach($students as $class)
                                    <option value="{{$class->enrollment_no}}">{{$class->admission_no}} | {{$class->roll_no}} | {{$class->name}} | {{$class->class}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Sibling Enrolment No. </label>
                            <input name="enrollment_no" type="text" placeholder="" class="form-control">
                        </div> --}}
                        <div class="col-xl-3 col-lg-6 col-12 form-group flex items-center">
                            <a href="javascript:void(0)" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark searchSibling">Search</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-center my-3">OR</div>
                <hr>
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Parents Details</h3>
                    </div>
                </div>
                <div class="new-added-form">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Father Name *</label>
                            <input name="father_name" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Father Phone *</label>
                            <input name="father_phone" type="text" minlength="10" maxlength="10" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Father Occupation *</label>
                            <select name="father_occupation" class="select2 required">
                                <option class="" value="">Please Select Occupation *</option>
                                <option value="Private Emp.">Private Emp.</option>
                                <option value="Government Emp.">Government Emp.</option>
                                <option value="Bussiness Men">Bussiness Men</option>
                                <option value="Not Working">Not Working</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Mother Name </label>
                            <input name="mother_name" type="text" placeholder="" class="form-control">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Mother Phone </label>
                            <input name="mother_phone" type="text" minlength="10" maxlength="10" placeholder="" class="form-control">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Mother Occupation *</label>
                            <select name="mother_occupation" class="select2 required">
                                <option class="" value="">Please Select Occupation *</option>
                                <option value="Private Emp.">Private Emp.</option>
                                <option value="Government Emp.">Government Emp.</option>
                                <option value="Bussiness Men">Bussiness Women</option>
                                <option value="House Wife">House Wife</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Parent E-Mail *</label>
                            <input name="parent_email" type="email" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Parent Password *</label>
                            <input name="password" type="password" placeholder="" class="form-control required">
                            <div class="float-right passwordType"> <i class="fa fa-eye-slash"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card height-auto">
            <div class="card-body !bg-red-200">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Assign Fees</h3>
                    </div>
                </div>
                <div class="new-added-form">
                    <div class="row feeTypes">
                        {{-- @if(isset($fees) && count($fees))
                        @foreach($fees as $fee)
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <div class="form-check">
                                <input type="checkbox" name="fee[]" class="form-check-input" value="{{$fee->id}}">
                                <label for="remember-me" class="form-check-label">{{$fee->name}}</label>
                            </div>
                        </div>
                        @endforeach
                        @else --}}
                            <div>Please Assign Class for fee types!</div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="card height-auto">
            <div class="card-body !bg-red-200">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Assign Routes for Transport</h3>
                    </div>
                </div>
                <div class="new-added-form">
                    <div class="row">
                        @if(isset($scRoutes) && count($scRoutes))
                        @foreach($scRoutes as $scRoute)
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <div class="form-check">
                                <input type="radio" name="scRoutes" class="form-check-input" value="{{$scRoute->id}}">
                                <label for="remember-me" class="form-check-label">{{$scRoute->route_name}}</label>
                            </div>
                        </div>
                        @endforeach
                        @else
                            <div>No Routes Available!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>ID Proofs</h3>
                    </div>
                </div>
                <div class="new-added-form">
                    <div class="row">
                        <div class="col-lg-6 col-12 form-group mg-t-30">
                            <label class="text-dark-medium">Upload Student Photo (150px X 150px)</label>
                            <input name="photo" type="file" class="form-control-file required">
                        </div>
                        <div class="col-lg-6 col-12 form-group mg-t-30">
                            <label class="text-dark-medium">Upload ID Front Photo (150px X 150px)</label>
                            <input name="id_proof_front" type="file" class="form-control-file required">
                        </div>
                        <div class="col-lg-6 col-12 form-group mg-t-30">
                            <label class="text-dark-medium">Upload ID Back Photo (150px X 150px)</label>
                            <input name="id_proof_back" type="file" class="form-control-file required">
                        </div>
                        <div class="col-lg-6 col-12 form-group mg-t-30">
                            <label class="text-dark-medium">Upload Other Document </label>
                            <input name="other_document" type="file" class="form-control-file">
                        </div>
                        <div class="col-12 form-group mg-t-8">
                            <button type="submit" class="submitForm btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                            <button type="reset" class="reset_form btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Admit Form Area End Here -->
@endsection


@section('inner_js')

<script>

    function searchSibling(response){
        if(response.data.length == 0){
        responseToast(response.message,'bg-warning');
        }
        response = response.data;
        $('input[name=father_name]').val(response.father_name);
        $('input[name=father_phone]').val(response.father_phone);
        $('input[name=father_occupation]').val(response.father_occupation);
        $('input[name=mother_name]').val(response.mother_name);
        $('input[name=mother_phone]').val(response.mother_phone);
        $('input[name=mother_occupation]').val(response.mother_occupation);
        $('input[name=parent_email]').val(response.parent_email);
        $('input[name=password]').val(response.password);

    }
    
    $('.searchSibling').on('click', function(){
        callApi('post',"{{route('admin.post.studentDetailByEnrollNo')}}",{enrollment_no:$('select[name=enrollment_no]').val()},searchSibling);
    });
    
    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createStudent')}}",data,ajaxResponse);
    }
    // $('.submitForm').on('click',function(e){
    //     e.preventDefault();
    //     submitForm($(this).parents('form'));
    // });
    
    function changeFeeTypes(response){
        let html = ``;
        $(response.fee).each(function(i,item){
            
            html += `
                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <div class="form-check">
                        <input id="fee_${item.id}" type="checkbox" name="fee[]" class="form-check-input" value="${item.id}">
                        <label for="fee_${item.id}" class="form-check-label">${item.name}</label>
                    </div>
                </div>
            `;
        });
        $('.feeTypes').html(html);
    }

    $('.changeClass').on('change', function(){
        callApi('post',"{{route('admin.post.getSectionsByClass')}}",{class_id:$(this).val()},changeFeeTypes);
    });
    $(document).ready(function(){
        let class_id = $('.changeClass').val();
        
        if(class_id){
            callApi('post',"{{route('admin.post.getSectionsByClass')}}",{class_id:class_id},changeFeeTypes);
        }
    });

</script>

@endsection