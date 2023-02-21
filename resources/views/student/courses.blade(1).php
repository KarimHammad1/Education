@extends('layouts.app')

@section('content')
<!-- header section ends -->

<section class="heading-link">
<h3> Our courses in {{$subject->title}}</h3>
<p> <a href="/">Home/</a> <a href="/courses"> Categories</a> /{{$subject->title}} </p>
</section>


<section class="courses">

<div class="box-container">
@foreach ($courses as $course)

<div class="box">
  <div class="image">
     <img src="{{ asset('../'.$course['image_path']) }}" alt="">
     <h3>{{ $course->title }}</h3>
  </div>
  <div class="content">
     <p>{{ $course->description }}</p>
     <a href="/courseInfo/{{ $course->id }}" class="btn">read more</a>
     <div class="icons">
        <span> <i class="fas fa-book"></i> {{ $course->modules }} modules </span>
        <span> <i class="fas fa-clock"></i> {{ $course->duration }} hours </span>
     </div>
  </div>
</div>

@endforeach

</div>
</section>
@endsection