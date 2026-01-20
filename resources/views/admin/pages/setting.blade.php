@extends('admin.inner_master')

@section('inner_body')

                <!-- Add Job -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Account Setting</h3>
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
                        <form class="form">
                            <div class="row">
                                {{-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>School Code </label>
                                    <input value="{{$appdata->title ?? 'Germination mission school'}}" name="title" type="text" placeholder="" class="form-control">
                                </div> --}}
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Title </label>
                                    <input value="{{$appdata->title ?? 'Germination mission school'}}" name="title" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Email </label>
                                    <input value="{{$appdata->email ?? 'info@germinationmission.com'}}" name="email" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Primary Phone </label>
                                    <input value="{{$appdata->primary_phone ?? 'info@germinationmission.com'}}" name="primary_phone" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Secondary Phone </label>
                                    <input value="{{$appdata->secondary_phone ?? 'info@germinationmission.com'}}" name="secondary_phone" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Email </label>
                                    <input value="{{$appdata->email ?? 'info@germinationmission.com'}}" name="email" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address </label>
                                    <input value="{{$appdata->address ?? 'Germination mission school , Aurangabad , Bihar , 824114'}}" name="address" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Logo</label>
                                    <input type="file" name="logo" class="form-control-file">
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Signature</label>
                                    <input type="file" name="signature" class="form-control-file">
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Stamp</label>
                                    <input type="file" name="stamp" class="form-control-file">
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="button" class="submitForm btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
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
    

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.updateAppdata')}}",data,ajaxResponseModal);
    }

</script>

@endsection