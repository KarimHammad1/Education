@extends('Layouts.admin')

@section('content')

<form method="POST" action="/updateuser/{{$user->id}}" enctype="multipart/form-data">
        @csrf

    <div class="row"  > 
        <div class="col-sm-2">
        <label for="" class="form-label">Name</label>
        <input class="form-control" value="{{$user->name}}" name="name" id="name" placeholder="Name">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Email</label>
        <input class="form-control" value="{{$user->email}}" name="email" id="email" placeholder="Email">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Phone Number</label>
        <input class="form-control" value="{{$user->phone_number}}" name ="phone_number" id="phone_number" placeholder="Phone Number">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Address</label>
        <input class="form-control" value="{{$user->address}}" name ="address" id="address" placeholder="Address">
        </div>
        <div class="col-sm-3">
        <label for=" " class="form-label">Image</label>
        <input type="file" value="{{$user->image}}" class="form-control" name="Image">
        </div>
    </div>

      <div class="row"  > 
        <div class="col-sm-2">
        <label for="" class="form-label">New Password</label>
        <input type="password" class="form-control" value="" name="password" id="password" placeholder="Password">
        </div>
      </div>
     <div class="row">
     <div class="col-sm-3">&nbsp</div>
     <div class="col-sm-2"></div>
     <div class="col-sm-3">
     <input type="submit" value="Update User" class="btn btn-primary">
     </div>
     </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection