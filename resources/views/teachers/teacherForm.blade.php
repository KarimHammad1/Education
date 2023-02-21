<!DOCTYPE html>
<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </head>
  <body>
    <header class="header">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" style="margin-left:30px;" href="#">&#8592;</a>
  </div>
</nav>
      </header>
<p></p>

    <form method="POST" action="/teacher/add" enctype="multipart/form-data">
        @csrf
        <div class="row"  > 
        <div class="col-sm-2">
        <label for="" class="form-label">Tittle</label>
        <input class="form-control" list="datalistOptions" name="Tittle" id="Tittle" placeholder="Tittle">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Duration</label>
        <input class="form-control" list="datalistOptions" name="Duration" id="Duration" placeholder="Duration">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Modules</label>
        <input class="form-control" list="datalistOptions" name ="Modules" id="Modules" placeholder="Modules">
        </div>
        <div class="col-sm-2">
        <label for=" " class="form-label">Id of the playlist</label>
        <input class="form-control" list="datalistOptions" name ="URL" id="URL" placeholder="ID">
        </div>
        <div class="col-sm-3">
        <label for=" " class="form-label">Image</label>
        <input type="file" class="form-control" name="Image">
        </div>
        <div class="col-sm-3">
        <label for=" " class="form-label">video</label>
        <input type="file" class="form-control" name="video">
        </div>
        <div class="col-sm-3" style="margin-top:30px; ">
          <select class="form-control" name="subject">
            @foreach ($subjects as $sub)
            <option value="{{ $sub->id }}"> 
                {{ $sub->title }} 
            </option>
        @endforeach    
    </select>
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descrption</label>
        <textarea class="form-control" name ="Description" id="Description" placeholder="Description" rows="3"></textarea>
     </div>
     <div class="row">
     <div class="col-sm-3">&nbsp</div>
     <div class="col-sm-2"></div>
     <div class="col-sm-3">
     <input type="submit" value="Add Course" class="btn btn-primary">
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
  </body>
</html>
