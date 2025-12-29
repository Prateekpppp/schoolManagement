@extends('admin.inner_master')

@section('inner_body')

                <!-- Add Job -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Expense</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
        
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <form class="new-added-form">
                            @csrf
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Job Title *</label>
                                    <input name="title" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Salary *</label>
                                    <input name="salary" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Openings *</label>
                                    <input name="openings" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Education Qualification *</label>
                                    <input name="education" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Experience *</label>
                                    <select name="experience" class="select2">
                                        <option value="">Please Select</option>
                                        <option value="1">1 year</option>
                                        <option value="2">2 year</option>
                                        <option value="3">3 year</option>
                                        <option value="4">more then 3 year</option>
                                    </select>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>English Level *</label>
                                    <select name="english_level" class="select2">
                                        <option value="">Please Select</option>
                                        <option value="1">Low</option>
                                        <option value="2">Medium</option>
                                        <option value="3">High</option>
                                    </select>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select name="gender" class="select2">
                                        <option value="">Please Select</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Both</option>
                                    </select>
                                    
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Working Hours</label>
                                    <input name="working_hours" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Description</label>
                                    <textarea name="description" rows="4" cols="50" placeholder="Job Description" class="form-control air-datepicker" data-position="bottom right" style="height: unset;"></textarea>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark submitForm">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Job End Here -->
@endsection

@section('inner_js')

<script>
    
    $('.submitForm').on('click',function(e){
        e.preventDefault();
        let data = new FormData($(this).parents('form')[0]);
        callAjaxFormData('post',"{{route('admin.post.createJob')}}",data,ajaxResponse);
    });

</script>

@endsection
