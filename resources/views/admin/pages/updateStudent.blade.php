@extends('admin.inner_master')

@section('inner_body')

    <!-- Admit Form Area Start Here -->

    <form>

        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Update Student</h3>
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
                        <input type="hidden" name="id" value="{{$data->id ?? ''}}">
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Admission Number *</label>
                            <input name="admission_no" value="{{$data->admission_no ?? ''}}" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Name *</label>
                            <input name="name" value="{{$data->name ?? ''}}" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Date Of Birth *</label>
                            <input name="dob" value="{{$data->dob ?? ''}}" type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker required"
                                data-position='bottom right'>
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Gender *</label>
                            <select name="gender" class="select2 required">
                                <option value="">Please Select Gender *</option>
                                <option {{$data->gender == 1 ? 'selected' : ''}} value="1">Male</option>
                                <option {{$data->gender == 2 ? 'selected' : ''}} value="2">Female</option>
                                <option {{$data->gender == 3 ? 'selected' : ''}} value="3">Others</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Religion *</label>
                            <select name="religion" class="select2 required">
                                <option value="">Please Select Religion *</option>
                                <option {{$data->religion == 'Hindu' ? 'selected' : ''}} value="Hindu">Hindu</option>
                                <option {{$data->religion == 'Islam' ? 'selected' : ''}} value="Islam">Islam</option>
                                <option {{$data->religion == 'Christian' ? 'selected' : ''}} value="Christian">Christian</option>
                                <option {{$data->religion == 'Buddish' ? 'selected' : ''}} value="Buddish">Buddish</option>
                                <option {{$data->religion == 'Others' ? 'selected' : ''}} value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Blood Group </label>
                            <select name="blood_group" class="select2">
                                <option value="">Please Select Group *</option>
                                <option {{$data->blood_group == 'A+' ? 'selected' : ''}} value="A+">A+</option>
                                <option {{$data->blood_group == 'A-' ? 'selected' : ''}} value="A-">A-</option>
                                <option {{$data->blood_group == 'B+' ? 'selected' : ''}} value="B+">B+</option>
                                <option {{$data->blood_group == 'B-' ? 'selected' : ''}} value="B-">B-</option>
                                <option {{$data->blood_group == 'O+' ? 'selected' : ''}} value="O+">O+</option>
                                <option {{$data->blood_group == 'O-' ? 'selected' : ''}} value="O-">O-</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Caste *</label>
                            <select name="caste" class="select2 required">
                                <option value="">Please Select Group *</option>
                                <option {{$data->caste == 'General' ? 'selected' : ''}} value="General" selected>General</option>
                                <option {{$data->caste == 'OBC' ? 'selected' : ''}} value="OBC">OBC</option>
                                <option {{$data->caste == 'ST/SC' ? 'selected' : ''}} value="ST/SC">ST/SC</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>City *</label>
                            <input name="city" value="{{$data->city ?? ''}}" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>State *</label>
                            <input name="state" value="{{$data->state ?? ''}}" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Address *</label>
                            <input name="address" value="{{$data->address ?? ''}}" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Phone *</label>
                            <input name="phone" value="{{$data->phone ?? ''}}" minlength="10" maxlength="10" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>E-Mail *</label>
                            <input name="email" value="{{$data->email ?? ''}}" type="email" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Password </label>
                            <input name="password" type="password" placeholder="Leave empty if want to use old password" class="form-control">
                            <div class="float-right passwordType"> <i class="fa fa-eye-slash"></i> </div>
                        </div>
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
                                @foreach($globalClasses as $class)
                                    <option {{$data->class == $class->id ? 'selected' : ''}} value="{{$class->id}}">{{$class->class}}</option>
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
                            <input value="{{$data->roll_no ?? ''}}" name="roll_no" type="text" placeholder="" class="form-control required">
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
                            <label>Sibling Enrolment No. </label>
                            <input name="enrollment_no" value="{{$data->sibling_id ?? ''}}" type="text" placeholder="" class="form-control">
                        </div>
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
                            <input name="father_name" value="{{$data->father_name ?? ''}}" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Father Phone *</label>
                            <input name="father_phone" value="{{$data->father_phone ?? ''}}" type="text" minlength="10" maxlength="10" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Father Occupation *</label>
                            <select name="father_occupation" class="select2 required">
                                <option class="" value="">Please Select Occupation *</option>
                                <option {{$data->father_occupation == 'Private Emp.' ? 'selected' : ''}} value="Private Emp.">Private Emp.</option>
                                <option {{$data->father_occupation == 'Government Emp.' ? 'selected' : ''}} value="Government Emp.">Government Emp.</option>
                                <option {{$data->father_occupation == 'Bussiness Men' ? 'selected' : ''}} value="Bussiness Men">Bussiness Men</option>
                                <option {{$data->father_occupation == 'Not Working' ? 'selected' : ''}} value="Not Working">Not Working</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Mother Name *</label>
                            <input name="mother_name" value="{{$data->mother_name ?? ''}}" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Mother Phone *</label>
                            <input name="mother_phone" value="{{$data->mother_phone ?? ''}}" type="text" minlength="10" maxlength="10" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Mother Occupation *</label>
                            <select name="mother_occupation" class="select2 required">
                                <option class="" value="">Please Select Occupation *</option>
                                <option {{$data->father_occupation == 'Private Emp.' ? 'selected' : ''}} value="Private Emp.">Private Emp.</option>
                                <option {{$data->father_occupation == 'Government Emp.' ? 'selected' : ''}} value="Government Emp.">Government Emp.</option>
                                <option {{$data->father_occupation == 'Bussiness Men' ? 'selected' : ''}} value="Bussiness Men">Bussiness Women</option>
                                <option {{$data->father_occupation == 'House Wife' ? 'selected' : ''}} value="House Wife">House Wife</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Mother Occupation *</label>
                            <input name="mother_occupation" value="{{$data->mother_occupation ?? ''}}" type="text" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Parent E-Mail *</label>
                            <input name="parent_email" value="{{$data->parent_email ?? ''}}" type="email" placeholder="" class="form-control required">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Parent Password *</label>
                            <input name="parent_password" type="password" placeholder="Leave empty if want to use old password" class="form-control">
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
                    {{-- <div class="row feeTypes"> --}}
                        
                        @if(isset($fees) && count($fees))
                        @foreach($fees as $fee)
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <div class="form-check">
                                <input type="checkbox" name="fee[]" class="form-check-input" value="{{$fee->id}}" checked>
                                <label for="remember-me" class="form-check-label">{{$fee->name}}</label>
                            </div>
                        </div>
                        @endforeach
                        @else
                            <div>Please Assign Class for fee types!</div>
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
                            <a href="{{asset('/').$data->photo}}" target="_blank" rel="noopener noreferrer">View</a>
                            <label class="text-dark-medium">Upload Student Photo (150px X 150px)</label>
                            <input name="photo" type="file" class="form-control-file">
                        </div>
                        <div class="col-lg-6 col-12 form-group mg-t-30">
                            <a href="{{asset('/').$data->id_proof_front}}" target="_blank" rel="noopener noreferrer">View</a>
                            <label class="text-dark-medium">Upload ID Front Photo (150px X 150px)</label>
                            <input name="id_proof_front" type="file" class="form-control-file">
                        </div>
                        <div class="col-lg-6 col-12 form-group mg-t-30">
                            <a href="{{asset('/').$data->id_proof_back}}" target="_blank" rel="noopener noreferrer">View</a>
                            <label class="text-dark-medium">Upload ID Back Photo (150px X 150px)</label>
                            <input name="id_proof_back" type="file" class="form-control-file">
                        </div>
                        <div class="col-lg-6 col-12 form-group mg-t-30">
                            @if($data->other_document)
                            <a href="{{asset('/').$data->other_document}}" target="_blank" rel="noopener noreferrer">View</a>
                            @endif
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
        callApi('post',"{{route('admin.post.studentDetailByEnrollNo')}}",{enrollment_no:$('input[name=enrollment_no]').val()},searchSibling);
    });
    
    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.manageStudent')}}",data,ajaxResponse);
    }
    // $('.submitForm').on('click',function(e){
    //     e.preventDefault();
    //     submitForm($(this).parents('form'));
    // });

    function loadFeeTypes(response){
        // console.log('feee');
        let html = ``;
        $(response.fee).each(function(i,item){
            
            html += `
                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <div class="form-check">
                        <input type="checkbox" name="fee[]" class="form-check-input feeCheckbox" value="${item.id}" checked>
                        <label for="remember-me" class="form-check-label">${item.name}</label>
                    </div>
                </div>
            `;
        });
        $('.feeTypes').html(html);

    }

    $(document).ready(function(){
        let class_id = $('.changeClass').val();
        
        // if(class_id){
        //     callApi('post',"{{route('admin.post.getSectionsByClass')}}",{class_id:class_id},loadFeeTypes);
        // }
    });

    function changeFeeTypes(response){
        // console.log('feee');
        let html = ``;
        $(response.fee).each(function(i,item){
            
            html += `
                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <div class="form-check">
                        <input type="checkbox" name="fee[]" class="form-check-input feeCheckbox" value="${item.id}">
                        <label for="remember-me" class="form-check-label">${item.name}</label>
                    </div>
                </div>
            `;
        });
        $('.feeTypes').html(html);

    }

    $('.changeClass').on('change', function(){
        callApi('post',"{{route('admin.post.getSectionsByClass')}}",{class_id:$(this).val()},changeFeeTypes);
    });

</script>

@endsection