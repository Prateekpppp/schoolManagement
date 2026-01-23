@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Staff Salary</h3>
                            </div>
                            <div>
                                <a href="{{route('admin.pages.salary')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">View All</a>
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
                                <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Staff </label>
                                    <select name="staff_id" class="select2 required">
                                        <option value="">Please Select Staff *</option>
                                        @foreach($staff as $class)
                                            <option {{ isset($data) && $data->staff_id == $class->id ? 'selected' : '' }} value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Present *</label>
                                    <input name="total_present" value="{{ isset($data) ? $data->total_present : '' }}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Half Day *</label>
                                    <input name="total_half_day" value="{{ isset($data) ? $data->total_half_day : '' }}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Leave *</label>
                                    <input name="total_leave" value="{{ isset($data) ? $data->total_leave : '' }}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Absent *</label>
                                    <input name="total_absent" value="{{ isset($data) ? $data->total_absent : '' }}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Monthly Salary *</label>
                                    <input name="monthly_salary" value="{{ isset($data) ? $data->monthly_salary : '' }}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Security Deposit *</label>
                                    <input name="security_deposit" value="{{ isset($data) ? $data->security_deposit : '' }}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Salary *</label>
                                    <input name="total_salary" value="{{ isset($data) ? $data->total_salary : '' }}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Salary Date *</label>
                                    <input name="salary_date" value="{{ isset($data) ? $data->salary_date : '' }}" type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker required">
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
                <!-- Add New Teacher Area End Here -->

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createSalary')}}",data,ajaxResponseModal);
    }
    

</script>

@endsection