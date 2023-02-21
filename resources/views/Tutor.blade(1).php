@extends('Layouts.app')

@section('content')

<section class="contact">
<h1 class="heading"> Subscribe now to join our team </h1>
<div class="row">

    <div class="image">
       <img src="image/contact-img.png" alt="">
    </div>

    <form method="POST" action="/send-mail">
        @csrf
       <h3></h3>
       <input type="text" name="name" placeholder="Enter Your Full Name" class="box">
       <input type="email" name="email" placeholder="Enter Your Email" class="box">
       <input type="text" name="phone" placeholder="Enter Your Phone Number" class="box">
       <input type="text" name="yt_link" placeholder="Enter Your YouTube Channel Link" class="box">
       <textarea name="Comment" class="box" placeholder="Comment" id="" cols="30" rows="10"></textarea>
       <input type="submit" value="send message" class="btn">
    </form>
    </div>
</section>


@endsection