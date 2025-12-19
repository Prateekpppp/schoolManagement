@extends('includes.inner_master')


@section('title', 'Career')

@section('inner_body')

      <!-- contact-area-start -->
      <div class="it-contact__area pt-50 pb-40">
         <div class="container">
            <div class="it-contact__wrap fix z-index-3 p-relative">
               <div class="it-contact__shape-1 d-none d-xl-block">
                  <img src="assets/img/contact/shape-2-1.png" alt="">
               </div>
               <div class="row align-items-end">
                  <div class="col-xl-7">
                     <div class="it-contact__right-box">
                        <div class="it-contact__section-box pb-20">
                           <h4 class="it-contact__title pb-15">Get in Touch</h4>
                           
                        </div>
                        <div class="it-contact__content mb-55">
                           <ul>
                              <li>
                                 <div class="it-contact__list d-flex align-items-start">
                                    <div class="it-contact__icon">
                                       <span><i class="fa-solid fa-location-dot"></i></span>
                                    </div>
                                    <div class="it-contact__text">
                                       <span>Our Address</span>
                                       <a href="#">Germination mission school , Deohara (oposite side of petrol pump) , PS :Goh , Dist:Aurangabad,<br>
                                          State:Bihar , 824114</a> 
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="it-contact__list d-flex align-items-start">
                                    <div class="it-contact__icon">
                                       <span><i class="fa-solid fa-clock"></i></span>
                                    </div>
                                    <div class="it-contact__text">
                                       <span>Hours of Operation</span>
                                       <a href="#">Mon - Fri: 9.00am to 5.00pm</a>
                                       <span>[2nd sat Holiday]</span>
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="it-contact__list d-flex align-items-start">
                                    <div class="it-contact__icon">
                                       <span><i class="fa-solid fa-phone phone"></i></span>
                                    </div>
                                    <div class="it-contact__text">
                                       <span>contact</span>
                                       <a href="">+91 87091 875774 , 79032 13204</a>
                                       <a href="mail to:info@germinationmissionschool.com">info@germinationmissionschool.com</a>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="it-contact__bottom-box d-flex align-items-center justify-content-between">
                           <div class="it-contact__scrool smooth">
                              <a href="#it-newsletter"><i class="fa-solid fa-arrow-down"></i>Customer Care</a>
                           </div>
                           <div class="it-footer-social">
                              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              <a href="#"><i class="fa-brands fa-instagram"></i></a>
                              <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                              <a href="#"><i class="fa-brands fa-twitter"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-5">
                     <div class="it-contact__form-box">
                        <form action="#">
                           <div class="row">
                              <div class="col-12 mb-25">
                                 <div class="it-contact-input-box">
                                    <label>Name*</label>
                                    <input type="text" placeholder="Name">
                                 </div>
                              </div>
                              <div class="col-12 mb-25">
                                 <div class="it-contact-input-box">
                                    <label>Email Address*</label>
                                    <input type="email" placeholder="Email">
                                 </div>
                              </div>
                              <div class="col-12 mb-25">
                                 <div class="it-contact-input-box">
                                    <label>Phone*</label>
                                    <input type="text" placeholder="Phone">
                                 </div>
                              </div>
                              <div class="col-12 mb-25">
                                 <div class="it-contact-input-box">
                                    <label>Subject*</label>
                                    <input type="text" placeholder="Subject">
                                 </div>
                              </div>
                              <div class="col-12 mb-25">
                                 <div class="it-contact-textarea-box">
                                    <label>Message</label>
                                    <textarea placeholder="Message"></textarea>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <button type="submit" class="it-btn">
                           <span>
                           Send Message
                              <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
                                 stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                              <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10"
                                 stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                        </span>
                     </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact-area-end -->

@endsection