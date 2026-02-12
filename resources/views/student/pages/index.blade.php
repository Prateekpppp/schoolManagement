@extends('student.inner_master')

@section('inner_body')
    
                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
                    @foreach($data as $student)
                    <div class="col-xl-3 col-sm-6 col-12">
                        <a href="{{route('student.pages.studentDetail',['id'=>$student->id])}}" class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="fa fa-layer-group text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">{{$student->name}}</div>
                                        <div>{{$student->admission_no}}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- Dashboard summery End Here -->
                
@endsection


@section('inner_js')
<script>
    console.log('after');
    
</script>
@endsection