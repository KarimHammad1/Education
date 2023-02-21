@extends('layouts.app')

@section('content')

<!-- header section ends -->

<section class="heading-link">
   <h3>contact us</h3>
   <p> <a href="/">Home</a> / Contact </p>
</section>

<!-- contact section starts  -->
<section class="contact">

   <h1 class="heading"> get in touch </h1>

   <div class="icons-container">

      {{-- <div class="icons">
         <i class="fas fa-clock"></i>
         <h3>opening hours :</h3>
         <p>00:0am to 00:06pm</p>
      </div> --}}

      <div class="icons">
         <i class="fas fa-phone"></i>
         <h3>Phone :</h3>
         <p>+96170853896</p>
      </div>

      <div class="icons">
         <i class="fas fa-envelope"></i>
         <h3> Email : </h3>
         <p>fasteducation79@gmail.com</p>
      </div>

      <div class="icons">
         <i class="fas fa-map"></i>
         <h3>Address :</h3>
         <p>Lebanon-Saida</p>
      </div>

   </div>
   @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
       <strong style="font-size: 25px;color:green; margin-left:200px;">{{ $message }}</strong>
   </div>
   @endif
   <div class="row">

      <div class="image">
         <img src="image/contact-img.png" alt="">
      </div>
      @if(Auth::user())
      <form method="POST" action="/review">
          @csrf
         <h3>send us your review</h3>
         <input type="text" name="name" @if($user)
                                             value="{{$user->name}}"
                                        @endif
         placeholder="Enter Your Full Name" class="box">
         <input type="email" name="email"@if($user)
         value="{{$user->email}}"
    @endif placeholder="Enter Your Email" class="box">
         <input type="text" name="phone" @if($user)
         value="{{$user->phone_number}}"
    @endif placeholder="Enter Your Phone Number" class="box">
         <textarea name="message" class="box" placeholder="Message" id="" cols="30" rows="10"></textarea>
         <input type="submit" value="send message" class="btn">
      </form>
      @endif
      @if(Auth::guest())
      <form method="POST" action="/review">
         @csrf
        <h3>send us your review</h3>
        <input type="text" name="name"  placeholder="Enter Your Full Name" class="box">
        <input type="email" name="email" placeholder="Enter Your Email" class="box">
        <input type="text" name="phone" placeholder="Enter Your Phone Number" class="box">
        <textarea name="message" class="box" placeholder="Message" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="send message" class="btn">
     </form>
     @endif
   </div>

</section>


<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq">

   <h1 class="heading">frequently asked questions</h1>

   <div class="accordion-container">

      <div class="accordion active">
         <div class="accordion-heading">
            <h3>how to contact for help?</h3>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accordion-content">
            We are more than happy to answer your questions, feel free to contact us through our phone number or email!  </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <h3>what is the best career in 2022?</h3>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accordion-content">
            The world is moving in the direction of technology. Our developers encourage the younger generation to choose the web development major. </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <h3>how much fees for web development?</h3>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accordion-content">
            Every single course on our website if for FREE!  </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <h3>can I choose my own tutor?</h3>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accordion-content">
            You can choose your own course, which can be taught by many tutors. All of those tutors are professionals and would provide a great experience for you. </p>
      </div>

   </div>

</section>

<!-- faq section ends -->

<!-- logo slider starts  -->

<section class="logo-container">
   <div class="swiper logo-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide"> <img src="image/partner-logo-1.png" alt=""> </div>
         <div class="swiper-slide"> <img src="image/partner-logo-2.png" alt=""> </div>
         <div class="swiper-slide"> <img src="image/partner-logo-3.png" alt=""> </div>
         <div class="swiper-slide"> <img src="image/partner-logo-4.png" alt=""> </div>
         <div class="swiper-slide"> <img src="image/partner-logo-5.png" alt=""> </div>
      </div>
   </div>
</section>

<!-- logo slider ends -->


@endsection