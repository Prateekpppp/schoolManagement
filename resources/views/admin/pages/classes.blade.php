@extends('admin.inner_master')

@section('inner_body')

                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Classes</h3>
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
                        <div class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input name="search" type="text" placeholder="Search ..." class="form-control">
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <a href="{{route('admin.pages.addClass')}}" class="btn fw-btn-fill btn-gradient-yellow">ADD CLASS</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Class</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($classes) || count($classes) == 0)
                                        <tr>
                                            <td colspan="11" class="text-center"></td>
                                            <td colspan="11" class="text-center">No Data Found</td>
                                            <td colspan="11" class="text-center"></td>
                                        </tr>
                                    @else
                                    @foreach ($classes as $key=>$job)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$job->class}}</td>
                                            {{-- <td>{{$job->sections}}</td> --}}
                                            {{-- <td>{{$job->status ? 'Active' : 'Inactive'}}</td> --}}
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                    <a href="{{route('admin.pages.manageClass',$job->id)}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Edit</a>
                                                    <a href="javascript:void(0)" data-model="Classes" data-id="{{$job->id}}" data-href="{{route('admin.post.delete')}}" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min">Delete</a>

                                                </div>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Teacher Table Area End Here -->
                

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createClass')}}",data,ajaxResponseModal);
    }

    function appendData(response){
        let rows = '';
        console.log(response);
        
        response.data.forEach(function(job){
            rows += `<tr>
                        <td>${job.class_name}</td>
                        <td>${job.status ? 'Active' : 'Inactive'}</td>
            </tr>`;
        });  
        $('.tdata').html(rows);
    }

    $(document).ready(function(){
        
        // callAjaxFormData('get',"{{route('admin.get.allClasses')}}",null,appendData);
    });
</script>

@endsection