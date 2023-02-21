@extends('Layouts.admin')

@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tittle</th>
      <th scope="col">Description</th>
      <th scope="col">Duration</th>
      <th scope="col">Modules</th>
      <th scope="col">URL</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($courses as $course)
    <tr id="{{$course->id}}">
      <th scope="row">{{$course->id}}</th>
      <td>{{$course->title}}</td>
      <td>{{$course->description}}</td>
      <td>{{$course->duration}}</td>
      <td>{{$course->modules}}</td>
      <td>{{$course->url}}</td>
      <td><img src="{{asset('../'.$course->image_path)}}" height="70px" width="100px"></td>
      <td>
        <a href="/courses/update/{{$course->id}}"><button type="button" class="btn btn-warning">Update</button></a>
       <a href="/deletecourse/{{$course->id}}"> <button type="button" class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection