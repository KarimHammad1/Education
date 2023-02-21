@extends('Layouts.admin')

@section('content')

<form method="POST" action="/updateenroll/{{$enroll->id}}" enctype="multipart/form-data">
        @csrf
    <div class="row"  > 
        <div class="col-sm-2">
        <label for="" class="form-label">Student ID</label>
        <input class="form-control" value="{{$enroll->St_id}}" name="user_id" id="user_id" placeholder="">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Course ID</label>
        <input class="form-control" value="{{$enroll->course_id}}" name="c_id" id="c_id" placeholder="">
        </div>
        {{-- <div class="col-sm-2">
        <label for=" " class="form-label">Course name</label>
        <input class="form-control" value="{{$enroll->course_name}}" name="c_id" id="c_id" placeholder="">
        </div>
        <div class="col-sm-3">
        <label for=" " class="form-label">Course Image</label>
        <input type="file" class="form-control" value="{{$enroll->course_id}}" name="c_id" id="c_id" placeholder="">
        </div> --}}
        
     <div class="row" style="margin-top: 10px;">
     <div class="col-sm-3">&nbsp</div>
     <div class="col-sm-2"></div>
     <div class="col-sm-3">
     <input type="submit" value="Update Enroll" class="btn btn-primary">
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