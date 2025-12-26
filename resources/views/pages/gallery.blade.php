@extends('includes.inner_master')


@section('title', 'Gallery ')

@section('inner_body')

       <!-- team-area-start -->
       <div class="it-team-3-area it-team-3-style-2  it-team-3-style-3 pt-50 pb-30">
         <div class="container">
            <div class="row tdata">
               
                     
            </div>
         </div>
      </div>
      <!-- team-area-end -->

@endsection

@section('inner_js')

      <script>

        function appendData(response){
            let rows = '';
            
            response.data.forEach(function(job){
                rows += 
                    `
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                        <div class="it-team-3-item text-center">
                            <div class="it-team-3-thumb fix">
                                <img src="${job.image}" alt="">
                            </div>
                        </div>
                    </div>
                    `;
                
            });  
            $('.tdata').html(rows);
        }

        // $(document).ready(function(){
            
            callAjaxFormData('get',"{{route('user.get.allGallery')}}",null,appendData);
        // });

      </script>

@endsection
