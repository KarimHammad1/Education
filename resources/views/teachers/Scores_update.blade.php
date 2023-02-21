@extends('layouts.app')

@section('content')
<section class="contact">

    <h1 class="heading"> Updating scores  for {{$score->Email}}</h1>

        <div class="row">
            <form method="POST" action="/update_score/{{$score->id}}">
                @csrf
                <h3>Update Score </h3>
               <input type="text" name="st_email" value="{{$score->Email}}" placeholder="Student Email" class="box" style="width:300px">
               <input type="text" name="score"value="{{$score->Score}}" placeholder="Score" class="box" style="width:300px">
               <select class="box" name="quiz_num" style="width:300px">
                    <option> </option>
                    <option value="1" >Quiz 1 </option>
                    <option value="2" >Quiz 2 </option>
                    <option value="3" >Quiz 3 </option>
               </select>
               <input type="submit" value="Update" class="btn">
            @error('st_email')
            <p style="color: red;font-size:20px;">{{$message}}</p>
            @enderror
            @error('score')
             <p style="color: red;font-size:20px;">{{$message}}</p>
             @enderror
            @error('quiz_num')
            <p style="color: red;font-size:20px;">{{$message}}</p>
            @enderror
            </form>
         </div>
        </section>
@endsection