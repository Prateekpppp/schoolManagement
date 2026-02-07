@extends('includes.inner_master')


@section('title', 'Our Team')

@section('inner_body')

       <!-- team-area-start -->
       <div class="it-team-3-area it-team-3-style-2  it-team-3-style-3 pt-50 pb-30">
         <div class="container">
            <div class="row">
               @if(isset($data) && count($data) > 0)
               @foreach($data as $staff)
               <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                  <div class="it-team-3-item text-center">
                     <div class="it-team-3-thumb fix h-[300px]" style="background: url({{ asset($staff->photo) }}); background-size:cover; background-position: center center">
                        {{-- <img src="{{ asset($staff->photo) }}" alt=""> --}}
                     </div>
                     <div class="it-team-3-content">
                        
                        <div class="it-team-3-author-box">
                           <h4 class="it-team-3-title"><a href="">{{$staff->name}}</a></h4>
                           <span>{{$staff->qualification}}</span>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               @else
               <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                  <div class="it-team-3-item text-center">
                     <div class="it-team-3-thumb fix">
                        <img src="assets/img/principal.jpeg" alt="">
                     </div>
                     <div class="it-team-3-content">
                        
                        <div class="it-team-3-author-box">
                           <h4 class="it-team-3-title"><a href="">Kamalika Chakraborty</a></h4>
                           <span>Principal (M.A. ,M.B.A. ,B.Ed, NTT, Author)</span>
                        </div>
                     </div>
                  </div>
               </div>
               @endif
               
                     
            </div>
         </div>
      </div>
      <!-- team-area-end -->

@endsection