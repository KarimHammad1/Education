@extends('Layouts.admin')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
$(document).ready(function(){

  $('#user').on('keyup',function(){

  $value=$(this).val();
  $.ajax({
  type : 'get',
  url : "/search",
  data:{'search':$value},
  success:function(data){
   $('tbody').html(data);
  //console.log(data);
  }
  });
  })
  }
)
  </script>
<input class="form-control" name="user" id="user" placeholder="Search By Name">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Role</th>
      <th scope="col">Email</th>
      <th scope="col">Phone number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    {{-- @foreach($users as $user)
    <tr id="{{$user->id}}">
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->user_role}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone_number}}</td>
      <td>
        <a href="/user/update/{{$user->id}}"><button type="button" class="btn btn-warning">Update</button></a>
        <a href="/deleteuser/{{$user->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
    @endforeach --}}
  </tbody>
</table>
@endsection