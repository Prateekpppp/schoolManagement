@extends('admin.inner_master')

@section('inner_body')
                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Students Data</h3>
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
                        <div class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input name="search" type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input name="search" type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input name="search" type="text" placeholder="Search by Class ..." class="form-control">
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">Roll</label>
                                            </div>
                                        </th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Parents</th>
                                        {{-- <th>Address</th> --}}
                                        <th>Date Of Birth</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($students) && count($students) == 0)
                                        <tr>
                                            <td colspan="11" class="text-center">No Data Found</td>
                                        </tr>
                                    @else
                                    @foreach ($students as $k=>$job)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input data-value="{{$job->id}}" type="checkbox" class="form-check-input checkOne">
                                                    <label class="form-check-label">{{$job->roll_no}}</label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{asset('/').$job->photo}}" alt="photo" width="50px" height="50px">
                                            </td>
                                            {{-- <td>{{$job->admission_no}}</td> --}}
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->gender ? 'Male' : 'Female'}}</td>
                                            <td>{{$job->class}}</td>
                                            <td>{{$job->section}}</td>
                                            <td>{{$job->father_name}}</td>
                                            <td>{{$job->dob}}</td>
                                            <td>{{$job->city}}</td>
                                            <td>{{$job->phone}}</td>
                                            <td>{{$job->email}}</td>
                                            {{-- <td>
                                                <div class="flex flex-row gap-2">
                                                    <a href="{{route('admin.pages.manageClass',$job->id)}}" class="btn fw-btn-fill btn-gradient-yellow w-25">Edit</a>
                                                    <a href="javascript:void(0)" data-model="Classes" data-id="{{$job->id}}" data-href="{{route('admin.post.delete')}}" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min">Delete</a>

                                                </div>
                                            </td> --}}
                                        </tr>
                                        
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="flex flex-row gap-2 justify-center py-2">
                            {{-- <button type="button" class="modal-trigger" data-toggle="modal"
                                data-target="#standard-modal">
                                Lunch Live Demo
                            </button> --}}
                            <a href="javascript:void(0)" class="modal-trigger generateFee" >Generate</a>

                        </div>

                    </div>
                </div>
                <!-- Student Table Area End Here -->
                
                <!-- Modal -->
                <div class="modal fade" id="standard-modal" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Select Fee Head</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="new-added-form">
                                    <input type="hidden" name="students" value="">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label>Fee Head *</label>
                                            <select name="name" class="select2 required">
                                                <option value="">Please Select Fee Head *</option>
                                                @if(count($fee) > 0)
                                                    @foreach($fee as $section)
                                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="closeModel footer-btn bg-dark-low"
                                    data-dismiss="modal">Close</button>
                                <button type="button" class="submitForm footer-btn bg-linkedin">Assign Fee</button>
                            </div>
                        </form>
                    </div>
                </div>
                
@endsection

@section('inner_js')

<script>
    let data = [];
    $('.checkAll').on('click', function(){
        console.log('check status',$('.checkAll').is(':checked'));
        
        let $checkboxes = $(this).parents('table').find('tbody').find('input[type=checkbox]');
        // $checkboxes.prop('checked', $('.checkAll').is(':checked'));
        
        if($(this).is(':checked')){
            $checkboxes.map(function(){
                data.push($(this).attr('data-value'));
            });

        } else{
            data = [];
        }

        console.log('data--',data);
        
    });

    $('.checkOne').on('click',function(){
        if($(this).is(':checked')){
            data.push($(this).attr('data-value'));

        } else{
            data = data.filter(item => item != $(this).attr('data-value'));
        }
        console.log('data--',data);
        
    });

    $('.generateFee').on('click',function(e){
        
        if(data.length == 0){
            responseToast('Please Select Student', 'bg-warning');
            $('.closeModel').click();
            return;
        }
        $('#standard-modal').modal('show');
        $('input[name=students]').val(data);
    });
    
    function submitForm(form){
        let data = new FormData($(form)[0]);
        console.log('data--',data);
        
        callAjaxFormData('post',"{{route('admin.post.assignFee')}}",data,ajaxResponseModal);
    }
</script>

@endsection