@extends('Layouts.admin')

@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Sudent id</th>
      <th scope="col">course_id</th>
      <th scope="col">Course Name</th>
      <th scope="col">Course Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($enrolls as $enroll)
    <tr id="{{$enroll->id}}">
      <th scope="row">{{$enroll->id}}</th>
      <td>{{$enroll->St_id}}</td>
      <td>{{$enroll->course_id}}</td>
      <td>{{$enroll->course_name}}</td>
      <td><img src="{{asset('../'.$enroll->course_image) }}" height="70px" width="100px"></td>
      <td>
        <a href="/enroll/update/{{$enroll->id}}">
        <button type="button" class="btn btn-warning">Update</button>
      </a>
        <a href="/deleteenroll/{{$enroll->id}}">
          <button type="button" class="btn btn-danger">Delete</button>
        </a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection