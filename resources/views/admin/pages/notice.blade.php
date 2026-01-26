@extends('admin.inner_master')

@section('inner_body')

                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Notice</h3>
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
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input name="search" type="text" placeholder="Search ..." class="form-control">
                                </div>
                                {{-- <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div> --}}
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#standard-modal" class="btn fw-btn-fill btn-gradient-yellow !max-w-min openEditModal">ADD NOTICE</a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Notice</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($notice) || count($notice) == 0)
                                        <tr>
                                            <td></td>
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                        </tr>
                                    @else
                                    @foreach ($notice as $key=>$job)
                                        <tr>
                                            <td>{{$key+=1}}</td>
                                            <td>{{$job->notice}}</td>
                                            {{-- <td>{{$job->status ? 'Active' : 'Inactive'}}</td> --}}
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                    {{-- <a data-id="{{$job->id}}" data-toggle="modal" data-target="#standard-modal" class="btn fw-btn-fill btn-gradient-yellow !max-w-min openEditModal">Edit</a> --}}
                                                    <a href="javascript:void(0)" data-model="Notice" data-id="{{$job->id}}" data-href="{{route('admin.post.delete')}}" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min">Delete</a>

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
                <!-- Modal -->
                <div class="modal fade" id="standard-modal" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Notice</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="new-added-form">
                                    <input id="id" type="hidden" name="id" value="">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label>Notice *</label>
                                            <textarea name="notice" type="text" placeholder="" class="form-control required"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="closeModel footer-btn bg-dark-low"
                                    data-dismiss="modal">Close</button>
                                <button type="button" class="submitForm footer-btn bg-linkedin">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createNotice')}}",data,ajaxResponseModal);
    }

    function appendData(response){
        let rows = '';
        console.log(response);
        
        response.data.forEach(function(job){
            rows += `<tr>
                        <td>${job.section_name}</td>
                        <td>${job.status ? 'Active' : 'Inactive'}</td>
            </tr>`;
        });  
        $('.tdata').html(rows);
    }


</script>

@endsection