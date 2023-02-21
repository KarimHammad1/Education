<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"defer></script>
     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./about.css">
   <script type="text/javascript" src="jquery-3.5.1.min.js">
   </script>

</head>
<body>
   
<header class="header">

<a href="#" class="logo"> <i class="fas fa-lightbulb"></i> educa </a>

@if (Auth::user())
@if (Auth::user()->user_role=='teacher')
<nav class="navbar">
   <div id="close-navbar" class="fas fa-times"></div>
   <a href="/">Home</a>
   <a href="/teachers/courses">My Courses</a>
   <a href="/about">About</a>
   <a href="/contact">Contact</a>
</nav>
@endif

@if (Auth::user()->user_role=='student')
<nav class="navbar">
   <div id="close-navbar" class="fas fa-times"></div>
   <a href="/">Home</a>
   <a href="/categories">Categories</a>
   <a href="/mylearning">My Learning</a>
   <a href="/about">About</a>
   <a href="/contact">Contact</a>
</nav>

@endif
@endif

@if (Auth::user())


<div class="icons" style="margin-right: 10px">
    <a href="/profile"><div  class="fas fa-user" id="usr"> {{auth()->user()->name}}</div></a>
</div>

<a href='/Logout'> <button type="button" class="btn btn-default btn-sm" style="height: 30px;
margin-left:10px;
margin-bottom:10px;
width:100px;
padding:0px;"> Log out
 </button></a>

@endif

@if (Auth::guest())

<nav class="navbar">
   <div id="close-navbar" class="fas fa-times"></div>
   <a href="/">home</a>
   <a href="/categories">Categories</a>
   <a href="/about">About</a>
   <a href="/contact">Contact</a>
   <a href="/Teachers">Tutors</a>
</nav>
<div class="icons">
 <div id="account-btn" class="fas fa-user" id="usr"></div>
 <div id="menu-btn" class="fas fa-bars"></div>
 @endif

</header>

<!-- account form section starts  -->



<div class="account-form" id="form">

<div id="close-form" class="fas fa-times"></div>

<div class="buttons">
   <span class="btn active login-btn">login</span>
   <span class="btn register-btn">register</span>
</div>

<form class="login-form active" action="/Login" method="POST">
    @csrf
   <h3>login now</h3>
   <input type="email" name="email_log" placeholder="Enter Your Email" class="box" value="{{old('email')}}">

    @error('email')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror

   <input type="password" name="password_log" placeholder="enter your password" class="box" value="{{old('password')}}">
   @error('password')
   <p class="text-red-500 text-xs mt-1">{{$message}}</p>
   @enderror
   <div class="flex">

      <a href="#">forgot password?</a>
   </div>
   <input type="submit" value="login now" class="btn">
</form>

<form class="register-form" method="POST" action="/register">
 @csrf
   <h3>register now</h3>
   <input type="text" name="name" placeholder="Enter Your Full Name" class="box" value="{{old('name')}}">
   @error('name')
   <p class="text-red-500 text-xs mt-1">{{$message}}</p>
   @enderror
   <input type="email" name="email" placeholder="Enter Your Email" class="box" value="{{old('email')}}">
   @error('email')
   <p class="text-red-500 text-xs mt-1">{{$message}}</p>
   @enderror
   <input type="text" name="phone_number" placeholder="Enter Your Phone Number" class="box" value="{{old('phone_number')}}">
   @error('phone_number')
   <p class="text-red-500 text-xs mt-1">{{$message}}</p>
   @enderror
   <input type="password" name="password" placeholder="Enter Your Password" class="box"   value="{{old('password')}}">
   @error('password')
     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
     @enderror
   <input type="password" name="password_confirmation" placeholder="Confirm Your Password" class="box" value="{{old('password_confirmation')}}">
   @error('password_confirmation')
   <p class="text-red-500 text-xs mt-1">{{$message}}</p>
   @enderror
   <input type="submit" value="Register Now" class="btn">
</form>

</div>

<!-- account form section ends -->
@yield('content')


<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3> <i class="fas fa-lightbulb"></i> educa </h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, voluptatem.</p>
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
      </div>

      <div class="box">
         <h3>quick links</h3>
         <a href="/" class="link">Home</a>
         <a href="/categories" class="link">Courses</a>
         <a href="/about" class="link">About</a>
         <a href="/contact" class="link">Contact</a>
      </div>

      {{-- <div class="box">
         <h3>useful links</h3>
         <a href="#" class="link">help center</a>
         <a href="#" class="link">ask questions</a>
         <a href="#" class="link">send feedback</a>
         <a href="#" class="link">private policy</a>
         <a href="#" class="link">terms of use</a>
      </div> --}}

      <div class="box">
         <h3>Subscribe To Join Our Team</h3>

         <form method="GET" action="/Teachers">
           <button class="btn">subscribe</button>
         </form>
      </div>

   </div>

   <div class="credit"> created by <span>Rami AL Khatib  & Ahmad Ghizzo</span> | All Rights Reserved! </div>

</section>
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
<html>