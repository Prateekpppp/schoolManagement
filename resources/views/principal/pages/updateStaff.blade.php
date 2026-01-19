@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Update Staff</h3>
                            </div>
                            <div class="">
                                <a href="{{route('admin.pages.staff')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">View All</a>
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
                                @if(isset($data->id))
                                <input type="hidden" name="id" value="{{$data->id ?? ''}}">
                                @endif
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Name *</label>
                                    <input name="name" value="{{$data->name ?? ''}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Phone *</label>
                                    <input name="phone" value="{{$data->phone ?? ''}}" minlength="10" maxlength="10"type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Email *</label>
                                    <input name="email" value="{{$data->email ?? ''}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address</label>
                                    <input name="address" value="{{$data->address ?? ''}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select name="gender" class="select2">
                                        <option value="">Please Select</option>
                                        <option {{ $data->gender == 1 ? 'selected' : '' }} value="1">Male</option>
                                        <option {{ $data->gender == 2 ? 'selected' : '' }} value="2">Female</option>
                                        <option {{ $data->gender == 3 ? 'selected' : '' }} value="3">Both</option>
                                    </select>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Role </label>
                                    <select name="role" class="select2 required">
                                        <option value="">Please Select Role *</option>
                                        <option {{ $data->status == 1 ? 'selected' : '' }} value="1">Teacher</option>
                                        <option {{ $data->status == 2 ? 'selected' : '' }} value="2">Staff</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Blood Group *</label>
                                    <select name="blood_group" class="select2 required">
                                        <option value="">Please Select Group *</option>
                                        <option {{ $data->blood_group == 'A+' ? 'selected' : '' }} value="A+">A+</option>
                                        <option {{ $data->blood_group == 'A-' ? 'selected' : '' }} value="A-">A-</option>
                                        <option {{ $data->blood_group == 'B+' ? 'selected' : '' }} value="B+">B+</option>
                                        <option {{ $data->blood_group == 'B-' ? 'selected' : '' }} value="B-">B-</option>
                                        <option {{ $data->blood_group == 'O+' ? 'selected' : '' }} value="O+">O+</option>
                                        <option {{ $data->blood_group == 'O-' ? 'selected' : '' }} value="O-">O-</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class </label>
                                    <select name="class" class="select2 changeClass required">
                                        <option value="">Please Select Class *</option>
                                        @foreach($globalClasses as $class)
                                            <option {{ $data->class_id == $class->id ? 'selected' : '' }} value="{{$class->id}}">{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Section </label>
                                    <select name="section" class="select2">
                                        <option class="secAfter" value="">Please Select Section *</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject </label>
                                    <select name="subject" class="select2">
                                        <option class="subAfter" value="">Please Subject Class *</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Salary *</label>
                                    <input name="salary" value="{{$data->salary ?? ''}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Qualification *</label>
                                    <input name="qualification" value="{{$data->qualification ?? ''}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Joining Date *</label>
                                    <input name="joining_date" value="{{$data->joining_date ?? ''}}" type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Photo (150px X 150px)</label>
                                    <input name="photo" type="file" class="form-control-file">
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload ID Front Photo (150px X 150px)</label>
                                    <input name="id_proof_front" type="file" class="form-control-file">
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload ID Back Photo (150px X 150px)</label>
                                    <input name="id_proof_back" type="file" class="form-control-file">
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Document </label>
                                    <input name="other_document" type="file" class="form-control-file">
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
        callAjaxFormData('post',"{{route('admin.post.manageStaff')}}",data,ajaxResponseModal);
    }

</script>

@endsection