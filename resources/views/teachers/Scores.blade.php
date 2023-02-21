@extends('layouts.app')

@section('content')
<section class="contact">

    <h1 class="heading"> Scores For {{$course->title}}</h1>

        <div class="row">
         
            <form method="POST" action="/add_score/{{$course->id}}">
                @csrf
                <h3>ADD Score </h3>
               <input type="text" name="st_email" placeholder="Student Email" class="box" style="width:300px">
               <input type="text" name="score" placeholder="Score" class="box" style="width:300px">
               <select class="box" name="quiz_num" style="width:300px">
                    <option> </option>
                    <option value="1" >Quiz 1 </option>
                    <option value="2" >Quiz 2 </option>
                    <option value="3" >Quiz 3 </option>
               </select>
               <input type="submit" value="Add" class="btn">
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
        @if(Session::has('message'))
            <p style="font-size: 20px; margin-left:50px;color:red;">{{ Session::get('message') }}</p>
        @endif
        <section class="table">
        <h2>Scores Table</h2>
        <table>
          <thead>
            <tr>
            <th>Email</th>
            <th>Score</th>
            <th>Quiz Number </th>
            <th>Action</th>
            </tr>
          </thead>
          @foreach($scores as $score)
          <tr>
            <td>{{$score->Email}}</td>
            <td>{{$score->Score}}</td>
            <td> {{$score->Quiz_num}}</td>
            <td>
                <a href="/update/{{$score->id}}">
                    <input type="submit" value="Update" class="btn">
                </a>
                <a href="/delete/{{$score->id}}">
                    <input type="submit" value="Delete" class="btn">
                </a>
            </td>
          @endforeach
        </table>
        </section>
@endsection