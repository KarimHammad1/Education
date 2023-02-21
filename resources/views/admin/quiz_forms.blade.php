@extends('Layouts.admin')

@section('content')

<form method="POST" action="/updatequiz/{{$quiz->id}}" enctype="multipart/form-data">
        @csrf
        <div class="row"  > 
        {{--<div class="col-sm-2">
         <label for="" class="form-label">Teacher ID</label>
        <input class="form-control" value="{{$quiz->Teacher_id}}" name="user_id" id="user_id" placeholder="Teacher ID">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Course ID</label>
        <input class="form-control" value="{{$quiz->course_id}}" name="c_id"  placeholder="Course ID">
    </div> --}}
        <div class="col-sm-2">
        <label for=" " class="form-label">Quiz 1</label>
        <input class="form-control" value="{{$quiz->Quiz_1}}" name="q1"  placeholder="Quiz 1">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Quiz 2</label>
        <input class="form-control" value="{{$quiz->Quiz_2}}" name="q2" placeholder="Quiz 2">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Quiz 3</label>
        <input class="form-control" value="{{$quiz->Quiz_3}}" name="q3" placeholder="Quiz 3">
        </div>
        
     <div class="row" style="margin-top: 10px;">
     <div class="col-sm-3">&nbsp</div>
     <div class="col-sm-2"></div>
     <div class="col-sm-3">
     <input type="submit" value="Update quiz" class="btn btn-primary">
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