@extends('Layouts.admin')

@section('content')

<form method="POST" action="/updatescore/{{$score->id}}" enctype="multipart/form-data">
        @csrf
        {{-- <div class="row"  > 
        <div class="col-sm-2">
        <label for="" class="form-label">Teacher ID</label>
        <input class="form-control" value="{{$score->Teacher_id}}" name="t_id"  placeholder="Teacher ID">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Student ID</label>
        <input class="form-control" value="{{$score->Student_id}}" name="s_id"  placeholder="Student ID">
        </div> --}}
        <div class="col-sm-2">
        <label for=" " class="form-label">Course ID</label>
        <input class="form-control" value="{{$score->Course_id}}" name="c_id"  placeholder="Course ID">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Email</label>
        <input class="form-control" value="{{$score->Email}}" name="em"  placeholder="score 1">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Score</label>
        <input class="form-control" value="{{$score->Score}}" name="sc" placeholder="score 2">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Quiz Number</label>
        <input class="form-control" value="{{$score->Quiz_num}}" name="qm" placeholder="score 3">
        </div>
        
     <div class="row" style="margin-top: 10px;">
     <div class="col-sm-3">&nbsp</div>
     <div class="col-sm-2"></div>
     <div class="col-sm-3">
     <input type="submit" value="Update score" class="btn btn-primary">
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