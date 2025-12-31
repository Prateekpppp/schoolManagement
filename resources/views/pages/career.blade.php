@extends('includes.inner_master')


@section('title', 'Career')

@section('inner_body')

<!-- contact-area-start -->
<div id="contact" class="it-contact-area it-contact-style-2 it-contact-bg p-relative pt-50 pb-20"
   data-background="assets/img/contact/bg-1-2.jpg">
   <div class="it-contact-shape-1 d-none d-xxl-block">
      <!-- <img src="assets/img/contact/shape-1-1.png" alt=""> -->
   </div>
   <div class="it-contact-shape-3 z-index-5 d-none d-xxl-block">
      <!-- <img src="assets/img/contact/shape-1-6.png" alt=""> -->
   </div>
   <div class="it-contact-shape-4 d-none d-xxl-block">
      <!-- <img src="assets/img/contact/shape-1-4.png" alt=""> -->
   </div>
   <div class="it-contact-shape-5 d-none d-xxl-block">
      <!-- <img src="assets/img/contact/shape-1-7.png" alt=""> -->
   </div>
   <div class="container">
      <div class="row align-items-center">
         <div class="col-xl-12 col-lg-6">
            <div class="it-contact-left">
               <div class="it-contact-title-box pb-20">

                  <h2 class="it-section-title-3">WE ARE HIRING !!!</h2>
               </div>
               <div class="container mb-4 tdata">
                  
                  <div class="alert alert-danger" role="alert">
                     No Jobs Found
                  </div>
                  {{-- <div class="row align-items-center job-box">

                     <!-- LEFT : JOB DETAILS -->
                     <div class="col-lg-4 col-md-6">
                        <h5 class="text-primary">English Teacher</h5>
                        <h6 class="fw-bold">Germination Mission School</h6>

                        <ul class="mt-2">
                           <li><b>Salary:</b> 10000 Rs. Per Month</li>
                           <li><b>Openings:</b> 4 Openings</li>
                           <li><b>Work Type:</b> School</li>
                        </ul>
                     </div>

                     <!-- MIDDLE : CONTACT DETAILS -->
                     <div class="col-lg-5 col-md-6">
                        <h6 class="fw-bold">Contact Details :</h6>
                        <p>
                           <b>Address:</b> 2nd Floor, Opposite Side Of Petrol Pump,
                           Aurangabad, Bihar
                        </p>
                        <p><b>Contact Person:</b> Amitabh Kumar</p>
                     </div>

                     <!-- RIGHT : BUTTON -->
                     <div class="col-lg-3 text-lg-end text-md-start">
                        <a href="#" class="btn btn-primary px-4">
                           MORE DETAILS
                        </a>
                     </div>

                  </div> --}}
               </div>



            </div>
         </div>
      </div>
   </div>
</div>
<!-- contact-area-end -->
@include('includes.apply_now')
@endsection

@section('inner_js')

   <script>
      
      function appendData(response){
         let rows = '';
         let appdata = response.appdata;
         console.log(response);
         
         if(response.data.length == 0){
            responseToast('No Jobs Found!');
            return;
         }
         response.data.forEach(function(job){
               rows += 
                  `
                  <div class="row align-items-center job-box mb-3">

                     <!-- LEFT : JOB DETAILS -->
                     <div class="col-lg-4 col-md-6">
                        <h5 class="text-primary">${job.title}</h5>
                        <h6 class="fw-bold">Germination Mission School</h6>

                        <ul class="mt-2">
                           <li><b>Salary:</b> ${job.salary} Rs. Per Month</li>
                           <li><b>Openings:</b> ${job.openings} Openings</li>
                        </ul>
                     </div>

                     <!-- MIDDLE : CONTACT DETAILS -->
                     <div class="col-lg-5 col-md-6">
                        <h6 class="fw-bold">Contact Details :</h6>
                        <p>
                           <b>Address:</b> ${appdata[0].address}
                        </p>
                        <p><b>Contact Person:</b> ${appdata[0].admin_username}</p>
                     </div>

                     <!-- RIGHT : BUTTON -->
                     <div class="col-lg-3 text-lg-end text-md-start">
                        <a href="#" data-job_id="${job.id}" data-bs-toggle="modal" data-bs-target="#apply_now" class="applybtn btn btn-primary px-4">
                           Apply Now
                        </a>
                     </div>

                  </div>
                  `;
            
         });  
         $('.tdata').html(rows);
      }

      // $(document).ready(function(){
         
         callAjaxFormData('get',"{{route('user.get.allJobs')}}",null,appendData);
      // });
      
      $('body').on('click','.applybtn', function(){
         $('.job_id').val($(this).attr('data-job_id'));
      });

      function submitForm(){
         let data = new FormData($('form')[0]);
         callAjaxFormData('post',"{{route('user.post.applyNow')}}",data,ajaxResponse);
      };
      
   </script>

@endsection
