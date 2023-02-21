@extends('Layouts.admin')

@section('content')


  <!-- ========== section start ========== -->
  <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Users</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Main
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                  <i class="lni lni-users"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Students</h6>
                  <h3 class="text-bold mb-10">{{$counts[1]}}</h3>
                  <p class="text-sm text-success">
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                  <i class="lni lni-users"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Teachers</h6>
                  <h3 class="text-bold mb-10">{{$counts[2]}}</h3>
                  <p class="text-sm text-success">
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <i class="lni lni-code-alt"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Courses</h6>
                  <h3 class="text-bold mb-10">{{$counts[0]}}</h3>
                  <p class="text-sm text-danger">
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
          <!-- End Row -->
         
      <!-- ========== section end ========== -->
@endsection