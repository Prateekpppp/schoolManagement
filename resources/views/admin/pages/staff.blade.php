@extends('admin.inner_master')

@section('inner_body')

                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Staff Data</h3>
                            </div>
                            <div>
                                <a href="{{route('admin.pages.addStaff')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">Add Staff</a>
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
                        <form class="mg-b-20" type='GET' action="{{route('admin.pages.staffFilter')}}">
                            <div class="row gutters-8 items-center">
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <label class="hidden">Name </label>
                                    <input name="name" type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="hidden">Class </label>
                                    <select name="class_id" class="select2 changeClass">
                                        <option value="">Please Select Class</option>
                                        @foreach($globalClasses as $class)
                                            <option value="{{$class->id}}">{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="hidden">Section </label>
                                    <select name="section_id" class="select2">
                                        <option class="secAfter" value="">Please Select Section</option>
                                    </select>
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        {{-- <th>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">ID</label>
                                            </div>
                                        </th> --}}
                                        <th>Emp. Code</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        {{-- <th>Class</th>
                                        <th>Section</th> --}}
                                        <th>Subject</th>
                                        <th>Joining Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($data) && count($data) == 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">No Data Found</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                    @foreach ($data as $key=>$job)
                                        <tr>
                                            <td>{{'EMP_'.$job->id}}</td>
                                            {{-- <td>{{$key+1}}</td> --}}
                                            <td>
                                                <img src="{{asset('/').$job->photo}}" alt="photo" width="50px" height="50px">
                                            </td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->phone}}</td>
                                            <td>{{$job->email}}</td>
                                            <td>{{$job->gender ? 'Male' : 'Female'}}</td>
                                            <td>{{$job->address}}</td>
                                            {{-- <td>{{$job->class}}</td>
                                            <td>{{$job->section}}</td> --}}
                                            <td>{{$job->subject}}</td>
                                            {{-- <td>{{$job->status ? 'Active' : 'Inactive'}}</td> --}}
                                            <td>{{$job->joining_date}}</td>
                                            <td>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.updateStaff', ['id' => $job->id])}}">Edit</a>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.staffDetail',$job->id)}}">Details</a>
                                                @if($job->status != 0)
                                                <a href="javascript:void(0)" data-model="Staff" data-id="{{$job->id}}" data-status="0" class="updateStatus btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min" href="javascript:void(0)">Remove</a>
                                                @else
                                                <a href="javascript:void(0)" data-model="Staff" data-id="{{$job->id}}" data-status="1" class="updateStatus btn fw-btn-fill btn-gradient-yellow !bg-green-600 !max-w-min" href="javascript:void(0)">Restore</a>
                                                @endif
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

    function appendData(response){
        let rows = '';
        console.log(response);
        
        response.data.forEach(function(job){
            rows += `<tr>
                        <td>
                            <img src="{{asset('storage/')}}${job.photo}" alt="photo" width="50px" height="50px">
                        </td>
                        <td>${job.name}</td>
                        <td>${job.phone}</td>
                        <td>${job.email}</td>
                        <td>${job.gender ? 'Male' : 'Female'}</td>
                        <td>${job.address}</td>
                        <td>${job.class}</td>
                        <td>${job.section}</td>
                        <td>${job.subject}</td>
                        <td>${job.status ? 'Active' : 'Inactive'}</td>
                        <td>${job.created_at}</td>
            </tr>`;
        });  
        $('.tdata').html(rows);
    }

    $(document).ready(function(){
        
        // callAjaxFormData('get',"{{route('admin.get.allStaff')}}",null,appendData);
    });
</script>

@endsection