@extends('admin.inner_master')

@section('inner_body')

                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Applicant Data</h3>
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
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Applied Job</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Resume</th>
                                        <th>Gender</th>
                                        <th>Applied At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tdata">
                                    @if(count($applicants) == 0)
                                        <tr>
                                            <td colspan="11" class="text-center">No Data Found</td>
                                        </tr>
                                    @else
                                    @foreach ($applicants as $job)
                                        <tr>
                                            <td>{{$job->title}}</td>
                                            <td>{{$job->name}}</td>
                                            <td>{{$job->email}}</td>
                                            <td>{{$job->phone}}</td>
                                            <td><a href="{{asset('/').$job->uploads}}" download="{{$job->phone}}">Download Resume</a></td>
                                            <td>{{$job->gender ? 'Male' : 'Female'}}</td>
                                            <td>{{$job->created_at}}</td>
                                            <td>
                                                <div class="flex flex-row gap-2">
                                                    <a href="javascript:void(0)" data-model="Applicant" data-id="{{$job->id}}" data-href="{{route('admin.post.delete')}}" class="delete btn fw-btn-fill btn-gradient-yellow !bg-red-700 !max-w-min">Delete</a>

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
        
        // callAjaxFormData('get',"{{route('admin.get.allJobs')}}",null,appendData);
    });
</script>

@endsection