@extends('layouts.app')

@section('content')
<!-- header section ends -->

<section class="heading-link">
<h3>Our Categories</h3>
<p> <a href="home.html">Home</a> / Categories </p>
</section>

<!-- subjects section starts  -->

<section class="subjects">

   <div class="box-container">
   @foreach ($subject as $sub)
   <a href="/subject/{{$sub->id}}">
   <div class="box">
         <img src="{{ asset('../image/'.$sub['image']) }}" alt="">
         <h3>{{ $sub->title }}</h3>
      </div>
   </a>
   @endforeach

   </div>
</section>

<!-- subjects section ends -->

{{--
<section class="courses">

<h1 class="heading"> our famous courses </h1>

<div class="box-container"> --}}
{{-- @foreach ($courses as $course)

<div class="box">
  <div class="image">
     <img src="{{ asset('../image/'.$course['image_path']) }}" alt="">
     <h3>{{ $course->title }}</h3>
  </div>
  <div class="content">
     <h3>choose what's best for you!</h3>
     <p>{{ $course->description }}</p>
     <a href="/courseInfo/{{ $course->id }}" class="btn">read more</a>
     <div class="icons">
        <span> <i class="fas fa-book"></i> {{ $course->modules }} modules </span>
        <span> <i class="fas fa-clock"></i> {{ $course->duration }} hours </span>
     </div>
  </div>
</div>

@endforeach --}}

{{-- </div>
</section> --}}
@endsection