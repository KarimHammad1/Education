@extends('Layouts.app')

@section('content')
@if ($message = Session::get('flash'))
   <div class="alert alert-success alert-block">
       <strong style="font-size: 25px;color:rgb(255, 30, 0); margin-left:200px;">{{ $message }}</strong>
   </div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong style="font-size: 25px;color:green; margin-left:200px;">{{ $message }}</strong>
</div>
@endif
<!-- home section starts  -->
<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <section class="swiper-slide slide" style="background: url(image/home-slide-1.jpg) no-repeat;">
            <div class="content">
               <h3>the best courses you will find find here!</h3>
               {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas impedit labore dolore unde, quidem corrupti?</p> --}}
               <p></p>
               <a href="/courses" class="btn">Get Started</a>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(image/home-slide-2.jpg) no-repeat;">
            <div class="content">
               <h3>the best courses you will find find here!</h3>
               {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas impedit labore dolore unde, quidem corrupti?</p> --}}
               <p></p>
               <a href="/courses" class="btn">Get Started</a>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(image/home-slide-3.jpg) no-repeat;">
            <div class="content">
               <h3>the best courses you will find find here!</h3>
               {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas impedit labore dolore unde, quidem corrupti?</p> --}}
               <p></p>
               <a href="/courses" class="btn">Get Started</a>
            </div>
         </section>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- home section ends -->

<!-- home courses slider section starts  -->


<!-- home courses slider section ends -->

@endsection