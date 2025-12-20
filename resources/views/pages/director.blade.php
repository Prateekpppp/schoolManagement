@extends('includes.inner_master')


@section('title', 'director')

@section('inner_body')

        <div id="about" class="it-about-2-area p-relative pt-50 pb-50">
         <div class="it-about-2-shape-2 d-none d-xxl-block">
            <!-- <img src="assets/img/about/shape-2-2.png" alt=""> -->
         </div>
         
         <div class="container">
            <div class="row align-items-end">
               <div class="col-md-4 ">
                  <div class="it-about-2-thumb-wrap d-flex justify-content-between">
                     <div class="it-about-2-thumb p-relative ">
                        <!-- <img src="assets/img/team/team-1-4.png" alt="" width="100%"> -->
                         <img src="{{asset('assets')}}/avatar.png" alt="" style="width:100%; height:400px; object-fit:cover;">

                        <div class="it-about-2-shape-1 d-none d-xxl-block">
                           <!-- <img src="assets/img/about/shape-2-1.png" alt="" > -->
                        </div>
                     </div>
                     <!-- <div class="it-about-2-thumb">
                        <img src="assets/img/about/thumb-2-2.jpg" alt="">
                     </div> -->
                  </div>
               </div>
               <div class="col-md-7 mt-3">
                  <div class="it-about-2-right">
                     <div class="it-about-2-title-box pb-25">
                        
                        <h4 class="it-section-title">Director Message <br>
                          
                        </h4>
                     </div>
                     <div class="it-about-2-text pb-5">
                        <p>Germination Mission School is a nurturing educational institution committed to shaping young minds from Nursery to Class 10 with care, creativity, and confidence. True to our name, we believe that every child is a seed full of potential, and with the right guidance, values, and environment, that seed can grow into a strong and responsible individual.</p>
                     </div>
    
                     <div class="it-about-2-bottom d-flex justify-content-between align-items-end">
                        <div class="it-about-2-icon-wrap">
                           <div class="it-about-2-icon mb-25 d-flex align-items-center">
                              
                              
                           </div>
                           <div class="it-about-2-icon mb-10 d-flex align-items-center">
                              
                              
                           </div>
                           <a class="it-btn-white yellow-bg" href="{{route('user.contact')}}">
                              <span>
                                 Get In Touch
                                 <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                 </svg>
                              </span>
                           </a>
                        </div>
                        
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about-area-end -->
      

@endsection