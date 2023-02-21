@extends('layouts.app')

@section('content')
<!-- header section ends -->

<section class="heading-link">
<h3>My courses</h3>
<p> <a href="home.html">Home</a> / My courses </p>
</section>


<section class="courses">


<div class="box-container">
@foreach ($courses as $course)

<div class="box">
  <div class="image">
     <img src="{{ asset('../'.$course->course_image) }}" alt="">
     <h3>{{ $course->course_name }}</h3>
  </div>
  <div class="content">
     <a href="/courseInfo/{{ $course->course_id }}" class="btn">Get Started</a> &nbsp;&nbsp;&nbsp;
     <a href="/drop_course/{{ $course->course_id }}" class="btn">Drop Course</a>
  </div>
</div>

@endforeach

</div>
</section>
@endsection