@extends('layouts.app')

@section('content')

<section class="heading-link">
   <h3>My courses</h3>
   <p> <a href="/">Home</a> / courses </p>
</section>

<a href="/teacher/addCourse"><button class="btn">Add Course</button></a>
<section class="courses">
   <div class="box-container">
@foreach ($courses as $course)
      <div class="box">
         <div class="image">
            <img src="{{asset('../'.$course->image_path) }}" alt="">
            <h3>{{ $course->title }}</h3>
         </div>
         <div class="content">
            <h3>{{ $course->description }}</h3>
            <a href="/courseInfo/{{ $course->id }}" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-book"></i> {{ $course->modules }} modules </span>
               <span> <i class="fas fa-clock"></i> {{ $course->duration }} hours </span>
            </div>
            <div> 
               <a href="/Scores/{{$course->id}}"><button class="btnOp">Scores</button></a>&nbsp;
               <a href="/Quiz/{{$course->id}}"><button class="btnOp">Quiz</button></a><p></p>&nbsp;
               <a href="/course/{{$course->id}}"><button class="btnOp">Update</button></a>&nbsp;
               <form method="POST" action="/coursedel/{{$course->id}}">
                @csrf
                <button class="btnOp">Delete</button>
              </form>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</section>

@endsection