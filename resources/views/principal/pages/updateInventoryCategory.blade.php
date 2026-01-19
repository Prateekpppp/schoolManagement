@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Update Inventory Category</h3>
                            </div>
                            <div>
                                <a href="{{route('admin.pages.inventoryCategory')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">View All</a>
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
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Category Name *</label>
                                    <input name="category" value="{{$data->category}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class </label>
                                    <select name="class_id" class="select2 required">
                                        <option value="">Please Select Class *</option>
                                        @foreach($globalClasses as $class)
                                            <option {{ $data->class_id == $class->id ? 'selected' : '' }} value="{{$class->id}}">{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Amount *</label>
                                    <input name="amount" value="{{$data->amount}}" type="text" placeholder="" class="form-control required">
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
        callAjaxFormData('post',"{{route('admin.post.createInventoryCategory')}}",data,ajaxResponseModal);
    }

    // $('.remove_feeHead').on('click', function(){
    //     data = {};
    //     data['class_id'] = $(this).attr('class_id');
    //     data['section_id'] = $(this).attr('section_id');
    //     callApi('post',"{{route('admin.post.remove_cSection')}}",data,ajaxResponseModal);
    // });
    

</script>

@endsection