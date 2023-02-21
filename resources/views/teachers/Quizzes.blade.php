@extends('layouts.app')

@section('content')
<section class="contact">

    <h1 class="heading"> Putting Quiz For {{$course->title}}</h1>
    <h3>Steps to add quiz by google forms:</h3>
    <p> <b>1.</b>	Go to settings &nbsp;&nbsp;
        <b>2.</b>	Turn on the mark this is a quiz &nbsp;&nbsp;
        <b>3.</b>	Turn on response-> collect email address && limit to 1 response &nbsp;&nbsp;
        <b>4.</b>	Turn on forms default-> collect email address by default&nbsp;&nbsp;
        </p>
            @if($check==0)
        <div class="row">
            <form method="POST" action="/add_quiz/{{$course->id}}">
                @csrf
                <h3>ADD Quiz </h3>
               <input type="text" name="quiz_1" placeholder="Quiz 1" class="box" style="width:300px">
               <input type="text" name="quiz_2" placeholder="Quiz 2" class="box" style="width:300px">
               <input type="text" name="quiz_3" placeholder="Quiz 3" class="box" style="width:300px">
               <input type="submit" value="Submit" class="btn">
               @error('quiz_1')
               <p style="color: red;font-size:20px;">{{$message}}</p>
               @enderror
               @error('quiz_2')
                <p style="color: red;font-size:20px;">{{$message}}</p>
                @enderror
               @error('quiz_3')
               <p style="color: red;font-size:20px;">{{$message}}</p>
               @enderror
            </form>
         </div>
        @endif
            @if($check==1)
            <div class="row">
            <form method="POST" action="/update_quiz/{{$quiz[0]->id}}">
                <h3>Update Quiz </h3>
               <input type="text" name="quiz_1" value="{{$quiz[0]->Quiz_1}}" placeholder="Quiz 1" class="box" style="width:350px">
               <input type="text" name="quiz_2" value="{{$quiz[0]->Quiz_2}}" placeholder="Quiz 2" class="box" style="width:320px">
               <input type="text" name="quiz_3" value="{{$quiz[0]->Quiz_3}}" placeholder="Quiz 3" class="box" style="width:330px">
               <br>
               <input type="submit" value="UPDATE" class="btn" style="margin-right: 40px;">
            </form>
            
        </div>
            <br>
            <a href="/delete_quiz/{{$quiz[0]->id}}">
               <input type="submit" value="Delete" class="btn">
            </a>
            @endif
            
</section>

@endsection