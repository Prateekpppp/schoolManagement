<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')

    @yield('head')

</head>

<body>
   <!-- preloader -->
   <div id="preloader" style="display: none !important;">
      <div class="preloader">
         <span></span>
         <span></span>
      </div>
   </div>
   <!-- preloader end  -->

   <!-- back-to-top-start  -->
   <button class="scroll-top scroll-to-target" data-target="html">
      <i class="far fa-angle-double-up"></i>
   </button>
   <!-- back-to-top-end  -->
   
   <!-- it-offcanvus-area-start -->
   <div class="it-offcanvas-area">
      <div class="itoffcanvas">
         <div class="it-offcanva-bottom-shape d-none d-xxl-block">
         </div>
         <div class="itoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="itoffcanvas__logo">
            <a href="index.php">
               <img src="assets/img/logo.png" class="w-50" alt="">
            </a>
         </div>
         <div class="itoffcanvas__text">
            
         </div>
         <div class="it-menu-mobile"></div>
         <div class="itoffcanvas__info d-none">
            <h3 class="offcanva-title">Get In Touch</h3>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-envelope"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span>Email</span>
                  <a href="maito:info@germinationmissionschool.com">info@germinationmi<br>ssionschool.com</a>
               </div>
            </div>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-phone-alt"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span>Phone</span>
                  <a href="tel:(00)45611227890">+91 87091 87574 ,+91 79032 13204</a>
               </div>
            </div>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fas fa-map-marker-alt"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span>Location</span>
                  <a href="" target="_blank">Germination mission school ,
                     Deohara, BIHAR </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- it-offcanvus-area-end -->
   
    <header class="it-header-height" style="height:auto!important;">

        @include('includes.navbar')

    </header>

    <main>
        
        @yield('body')

    </main>
   <footer>

        @include('includes.footer')

   </footer>

    @include('includes.app_toast')
    
    <script src="{{ asset('assets') }}/js/jquery.js"></script>
    <script src="{{ asset('assets') }}/js/waypoints.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('assets') }}/js/magnific-popup.js"></script>
    <script src="{{ asset('assets') }}/js/purecounter.js"></script>
    <script src="{{ asset('assets') }}/js/wow.js"></script>
    <script src="{{ asset('assets') }}/js/countdown.js"></script>
    <script src="{{ asset('assets') }}/js/nice-select.js"></script>
    <script src="{{ asset('assets') }}/js/swiper-bundle.js"></script>
    <script src="{{ asset('assets') }}/js/isotope-pkgd.js"></script>
    <script src="{{ asset('assets') }}/js/imagesloaded-pkgd.js"></script>
    <script src="{{ asset('assets') }}/js/ajax-form.js"></script>
    <script src="{{ asset('assets') }}/js/main.js"></script>
    <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>

    @include('includes.ajaxCalls')
    @include('includes.script')
    @yield('js')
</body>

</html>
