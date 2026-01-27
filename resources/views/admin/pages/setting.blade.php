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
                                    <label>Director Name </label>
                                    <input value="{{$appdata->director_name ?? 'Amitabh Kumar'}}" name="director_name" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Contact Person </label>
                                    <input value="{{$appdata->contact_person ?? 'Amitabh Kumar'}}" name="contact_person" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Phone </label>
                                    <input value="{{$appdata->phone ?? '8757845682'}}" name="phone" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Email </label>
                                    <input value="{{$appdata->email ?? 'info@germinationmission.com'}}" name="email" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address </label>
                                    <input value="{{$appdata->address ?? 'Germination mission school , Aurangabad , Bihar , 824114'}}" name="address" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Latitude </label>
                                    <input value="{{$appdata->latitude ?? '25.003839'}}" name="latitude" type="text" placeholder="8" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Altitude </label>
                                    <input value="{{$appdata->altitude ?? '84.575035'}}" name="altitude" type="text" placeholder="8" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>School Hours </label>
                                    <input value="{{$appdata->school_hours ?? '8'}}" name="school_hours" type="text" placeholder="8" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>School Time </label>
                                    <input value="{{$appdata->school_time ?? '7:30 am'}}" name="school_time" type="text" placeholder="7:30 am" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Max Late time </label>
                                    <input value="{{$appdata->late_time ?? '8:30 am'}}" name="late_time" type="text" placeholder="8:30 am" class="form-control">
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