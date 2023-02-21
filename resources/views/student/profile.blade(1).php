@extends('layouts.app')

@section('content')

<!-- header section ends -->

<section class="heading-link">
   <h3>Profile</h3>
   <p> <a href="/">Home</a> / Profile </p>
</section>

<!-- contact section starts  -->
<section class="contact">

   <h1 class="heading">Your Profile</h1>
   <div class="row">

      <div class="image">
         <img src="{{ asset('../'.$user['image']) }}" alt="Put your profile picture" height="400px">
      </div>
      <form method="POST" action="/update_profile"  enctype="multipart/form-data">
          @csrf
         <input type="text" name="name" value="{{$user->name}}"placeholder="Enter Your Full Name" class="box">
         <input type="email" name="email"value="{{$user->email}}" placeholder="Enter Your Email" class="box">
         <input type="text" name="phone" value="{{$user->phone_number}}" placeholder="Enter Your Phone Number" class="box">
         <input type="file" name="Image"  class="box">
         <input type="text" name="address" value="{{$user->address}}" placeholder="Enter Your Address" class="box">
         <input type="submit" value="Update Profile" class="btn">
      </form>
   </div>
      <a href="/new_pass"><input type="submit" value="New Password" class='btn'></a>

</section>


<!-- contact section ends -->

@endsection