@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Update Subject</h3>
                            </div>
                            <div class="">
                                <a href="{{route('admin.pages.subject')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">View All</a>
                            </div>
                        </div>
                        <form class="new-added-form">
                            @if(isset($subject))
                            <input type="hidden" name="id" value="{{$subject->id}}">
                            @endif
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject Name *</label>
                                    <input value="{{(isset($subject) && !is_null($subject)) ? $subject->subject : ''}}" name="subject" type="text" placeholder="" class="form-control required">
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
        callAjaxFormData('post',"{{route('admin.post.createSubject')}}",data,ajaxResponseModal);
    }

</script>

@endsection