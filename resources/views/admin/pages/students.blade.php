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
                        <form class="mg-b-20" type='GET' action="{{route('admin.pages.studentFilter')}}">
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
                                        {{-- <th>Religion</th> --}}
                                        {{-- <th>Blood Group</th> --}}
                                        {{-- <th>Caste</th> --}}
                                        {{-- <th>State</th> --}}
                                        {{-- <th>Address</th> --}}
                                        <th>S. No.</th>
                                        <th>Photo</th>
                                        <th>Enrollment No.</th>
                                        <th>Admission No.</th>
                                        <th>Name</th>
                                        <th>Date Of birth</th>
                                        <th>Gender</th>
                                        <th>City</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th>Father's Name</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(!isset($students) || count($students) == 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
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
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else
                                    @foreach ($students as $k=>$job)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>
                                                <img src="{{asset('/').$job->photo}}" alt="photo" width="50px" height="50px">
                                            </td>
                                            <td>{{$job->enrollment_no}}</td>
                                            <td>{{$job->admission_no}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->dob}}</td>
                                            <td>{{$job->gender ? 'Male' : 'Female'}}</td>
                                            <td>{{$job->city}}</td>
                                            <td>{{$job->phone}}</td>
                                            <td>{{$job->email}}</td>
                                            <td>{{$job->father_name}}</td>
                                            <td>{{$job->class}}</td>
                                            <td>{{$job->section}}</td>
                                            <td>{{$job->status ? 'Active' : 'Inactive'}}</td>
                                            <td>
                                                <a class="btn fw-btn-fill btn-gradient-yellow !max-w-min" href="{{route('admin.pages.studentDetail',$job->id)}}">Details</a>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Student Table Area End Here -->
@endsection


@section('inner_js')

<script>

    function appendData(response){
        let rows = '';
        console.log(response);
        
        response.data.forEach(function(job){
            rows += `<tr>
                <td>${job.photo}</td>
                <td>${job.name}</td>
                <td>${job.gender ? 'Male' : 'Female'}</td>
                <td>${job.class}</td>
                <td>${job.section}</td>
                <td>${job.parent}</td>
                <td>${job.address}</td>
                <td>${job.dob}</td>
                <td>${job.phone}</td>
                <td>${job.email}</td>
                <td>${job.status ? 'Active' : 'Inactive'}</td>
                <td>${job.created_at}</td>
            </tr>`;
        });  
        $('.tdata').html(rows);
    }

    $(document).ready(function(){
        
        // callAjaxFormData('get',"{{route('admin.get.allStudents')}}",null,appendData);
    });
</script>

@endsection