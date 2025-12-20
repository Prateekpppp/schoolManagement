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
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Roll ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Class ..." class="form-control">
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Salary</th>
                                        <th>Openings</th>
                                        <th>Education</th>
                                        <th>Experience</th>
                                        <th>English Level</th>
                                        <th>Gender</th>
                                        <th>Working Hours</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(count($jobs) == 0)
                                        <tr>
                                            <td colspan="11" class="text-center">No Data Found</td>
                                        </tr>
                                    @else
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{$job->title}}</td>
                                            <td>{{$job->salary}}</td>
                                            <td>{{$job->openings}}</td>
                                            <td>{{$job->education}}</td>
                                            <td>{{$job->experience}}</td>
                                            <td>{{$job->english_level}}</td>
                                            <td>{{$job->gender ? 'Male' : 'Female'}}</td>
                                            <td>{{$job->working_hours}}</td>
                                            <td>{{$job->description}}</td>
                                            <td>{{$job->status ? 'Active' : 'Inactive'}}</td>
                                            <td>{{$job->created_at}}</td>
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
                <td>${job.title}</td>
                <td>${job.salary}</td>
                <td>${job.openings}</td>
                <td>${job.education}</td>
                <td>${job.experience}</td>
                <td>${job.english_level}</td>
                <td>${job.gender ? 'Male' : 'Female'}</td>
                <td>${job.working_hours}</td>
                <td>${job.description}</td>
                <td>${job.status ? 'Active' : 'Inactive'}</td>
                <td>${job.created_at}</td>
            </tr>`;
        });  
        $('.tdata').html(rows);
    }

    $(document).ready(function(){
        
        callAjaxFormData('get',"{{route('admin.get.allJobs')}}",null,appendData);
    });
</script>

@endsection