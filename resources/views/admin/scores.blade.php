@extends('Layouts.admin')

@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Teacher id</th>
      <th scope="col">Student id</th>
      <th scope="col">course_id</th>
      <th scope="col">Email</th>
      <th scope="col">Score </th>
      <th scope="col">Quiz Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($scores as $score)
    <tr id="{{$score->id}}">
      <th scope="row">{{$score->id}}</th>
      <td>{{$score->Teacher_id}}</td>
      <td>{{$score->Student_id}}</td>
      <td>{{$score->Course_id}}</td>
      <td>{{$score->Email}}</td>
      <td>{{$score->Score}}</td>
      <td>{{$score->Quiz_num}}</td>
      <td>
        <a href="/score/update/{{$score->id}}">
        <button type="button" class="btn btn-warning">Update</button>
      </a>
        <a href="/deletescore/{{$score->id}}">
          <button type="button" class="btn btn-danger">Delete</button>
        </a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection