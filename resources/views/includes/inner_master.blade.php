@extends('master')

@section('head')
   
   <style>
      .it-breadcrumb-bg {
    background-image: url("assets/img/school.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 20%;  /* 👈 fine-tuned */
    height: 250px;                 /* fixed height */
    display: flex;
    align-items: center;
    position: relative;
}

@media (max-width: 768px) {
    .it-breadcrumb-bg {
        min-height: 150px;
        background-position: top center;
    }
}


      </style>

@endsection

@section('body')
    
      <!-- breadcrumb-area-start -->
   <div class="it-breadcrumb-area it-breadcrumb-bg">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="it-breadcrumb-content z-index-3 text-center">
               <div class="it-breadcrumb-title-box">
                  <h3 class="it-breadcrumb-title text-capitalize">@yield('title')</h3>
               </div>
               <div class="it-breadcrumb-list">
                  <span><a href="{{ route('user.index') }}">Home</a></span>
                  <span class="dvdr">//</span>
                  <span>@yield('title')</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
      <!-- breadcrumb-area-end -->

      @yield('inner_body')
      
      <!-- cta-area-start -->
      <div class="it-cta-area it-cta-height black-bg p-relative">
         <div class="it-cta-bg d-none d-xl-block">
            <img src="assets/img/about/cta-1.png" alt="">
         </div>
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xl-9 col-lg-7 col-md-7">
                  <div class="it-cta-content">
                     <h4 class="it-cta-title">"Begin Your Journey with Germination mission school "</h4>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-5 col-md-5">
                  <div class="it-cta-button text-md-end">
                     <a class="it-btn-white yellow-bg" href="contact.php">
                        <span>
                           Contact Us
                           <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
                                 stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                              <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10"
                                 stroke-linecap="round" stroke-linejoin="round" />
                           </svg>
                        </span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- cta-area-end -->
@endsection