@extends('layouts.app')

@section('content')

<section class="heading-link">
   <h3>about us</h3>
   <p> <a href="/">Home</a> / About </p>
</section>

<!-- about section starts  -->


<section class="about">

   <div class="image">
      <img src="image/about-img.jpg" alt="">
   </div>

   <div class="content">
      <h3 class="about-title">we have best courses for you</h3>
      <p>Our website is one of the most successful websites on the internet. It provides its students with suitable courses that fulfill their educational needs. The statistics below show the trust and comfort the students feel towards our website.</p>
      <div class="icons-container">
         <div class="icons">
            <img src="images/about-icon-1.png" alt="">
            <h3>350+</h3>
            <span>courses</span>
         </div>
         <div class="icons">
            <img src="images/about-icon-2.png" alt="">
            <h3>1200+</h3>
            <span>students</span>
         </div>
         <div class="icons">
            <img src="images/about-icon-3.png" alt="">
            <h3>10+</h3>
            <span>awards</span>
         </div>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- students reviews section starts  -->


@endsection