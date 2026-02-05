@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Task</h3>
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
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Title </label>
                                    <input name="title" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Description *</label>
                                    <textarea name="description" placeholder="" class="form-control required"></textarea>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Remark </label>
                                    <textarea name="remark" placeholder="" class="form-control"></textarea>
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
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Task List</h3>
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
                        
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Title</th>
                                        {{-- <th>Created By</th> --}}
                                        <th>Description</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        {{-- <th>Status</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data) || count($data) == 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            {{-- <td></td> --}}
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                    @else
                                    @php
                                    $sn1 = 0;
                                    @endphp
                                    @foreach ($data as $key=>$job)
                                        <tr>
                                            <td>{{$sn1+=1}}</td>
                                            <td>{{$job->title}}</td>
                                            <td>{{$job->description}}</td>
                                            <td>{{$job->remark}}</td>
                                            <td>
                                                {{$job->status == 2 ? 'Completed' : 'Under Processing'}}
                                                {{-- <label class="switch">
                                                    <input type="checkbox"{{$job->status}}>
                                                    <span class="slider round"></span>
                                                </label> --}}
                                            </td>
                                            {{-- <td>{{$key}}</td> --}}
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                    @if(!$job->status && $currentUser->status == 3)
                                                    <a href="{{route('principal.get.updateTaskStatus', ['id' => $job->id,'status' => 1])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Completed</a>
                                                    @endif
                                                    @if($job->status < 2 && $currentUser->status < 3)
                                                    <a href="javascript:void(0)" data-id="{{$job->id}}" data-status="2" data-model="Task" class="updateStatus btn fw-btn-fill btn-gradient-yellow !max-w-min">Approve</a>
                                                    @endif
                                                    <a href="{{route('principal.pages.updateTask', ['id' => $job->id])}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Edit</a>
                                                    @if($job->status == 1 && $currentUser->status < 3)
                                                    <a data-href="{{route('admin.post.delete')}}" data-id="{{$job->id}}" data-model="Task" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min" href="javascript:void(0)">Remove</a>
                                                    @endif

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
                <!-- Add New Teacher Area End Here -->

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('principal.post.createTask')}}",data,ajaxResponseModal);
    }

</script>

@endsection