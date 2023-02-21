@extends('layouts.app')

@section('content')

<!-- contact section starts  -->
<section class="contact">

   <h1 class="heading">Change Password</h1>
   @if (session('success'))
        <div style="font-size: 10px;color:green;">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
   <div class="row">
      <form method="POST" action="/update_pass"  enctype="multipart/form-data">
          @csrf
         <input type="Passwor" name="current-password" placeholder="Current Password" class="box">
         @if ($errors->has('current-password'))
             <strong>{{ $errors->first('current-password') }}</strong>
        @endif
        @if (session('error_curr'))
        <div class="alert alert-danger">
            {{ session('error_curr') }}
        </div>
    @endif
         <input type="Password" name="new_password" placeholder="New Password" class="box">
         @if ($errors->has('new_password'))
                <strong>{{ $errors->first('new_password') }}</strong>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
         <input type="Password" name="new_password_confirmation"  placeholder="New Password Confirm" class="box">
         @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
         <input type="submit" value="Change password" class="btn">
      </form>
   </div>

</section>


<!-- contact section ends -->

@endsection