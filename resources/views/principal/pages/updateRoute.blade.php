@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Update Route</h3>
                            </div>
                            <div class="">
                                <a href="{{route('admin.pages.allRoutes')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="javascript:void(0)">View All</a>
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
                                    <label>Route Name *</label>
                                    <input name="route_name" value="{{$data->route_name}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Starting Location *</label>
                                    <input name="starting_location" value="{{$data->starting_location}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Ending Location *</label>
                                    <input name="ending_location" value="{{$data->ending_location}}" type="text" placeholder="" class="form-control required">
                                </div>
                                {{-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Route Fare *</label>
                                    <input name="route_fare" value="{{$data->route_fare}}" type="text" placeholder="" class="form-control required">
                                </div> --}}
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
        callAjaxFormData('post',"{{route('admin.post.manageRoute')}}",data,ajaxResponseModal);
    }

</script>

@endsection