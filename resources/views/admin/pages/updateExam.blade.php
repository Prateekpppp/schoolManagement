@extends('admin.inner_master')

@section('inner_body')


                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Update Exam</h3>
                            </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <a href="{{route('admin.pages.exam')}}" class="btn fw-btn-fill btn-gradient-yellow">View All</a>
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
                                    <label>Exam Code *</label>
                                    <input name="exam_code" value="{{$data->exam_code}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class *</label>
                                    <select name="class" class="select2 required">
                                        <option value="">Please Select Class *</option>
                                        @if(count($classes) > 0)
                                            @foreach($classes as $section)
                                                <option {{$data->class == $section->id ? 'selected' : ''}} value="{{$section->id}}">{{$section->class}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject *</label>
                                    <select name="subject" class="select2 required">
                                        <option value="">Please Select Subject *</option>
                                        @if(count($subject) > 0)
                                            @foreach($subject as $section)
                                                <option {{$data->subject == $section->id ? 'selected' : ''}} value="{{$section->id}}">{{$section->subject}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Exam Date *</label>
                                    <input name="date" value="{{$data->date}}" type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Exam Room Code *</label>
                                    <input name="room_code" value="{{$data->room_code}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Exam Time *</label>
                                    <input name="time" value="{{$data->time}}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Exam Hours *</label>
                                    <input name="exam_hours" value="{{$data->exam_hours}}" type="text" placeholder="" class="form-control required">
                                </div>
                                {{-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Start Time *</label>
                                    <input name="exam_code" type="text" placeholder="" class="form-control required">
                                </div> --}}
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
                

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createExam')}}",data,ajaxResponseModal);
    }

</script>

@endsection