@extends('Layouts.admin')

@section('content')

<table class="table" style="width: 500px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Teacher id</th>
      <th scope="col">course_id</th>
      <th scope="col">Quiz 1</th>
      <th scope="col">Quiz 2</th>
      <th scope="col">Quiz 3</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($quizzes as $quiz)
    <tr id="{{$quiz->id}}">
      <th scope="row">{{$quiz->id}}</th>
      <td>{{$quiz->Teacher_id}}</td>
      <td>{{$quiz->course_id}}</td>
      <td>{{$quiz->Quiz_1}}</td>
      <td>{{$quiz->Quiz_2}}</td>
      <td>{{$quiz->Quiz_3}}</td>
      <td>
        <a href="/quiz/update/{{$quiz->id}}">
        <button type="button" class="btn btn-warning">Update</button>
      </a>
        <a href="/deletequiz/{{$quiz->id}}">
          <button type="button" class="btn btn-danger">Delete</button>
        </a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection