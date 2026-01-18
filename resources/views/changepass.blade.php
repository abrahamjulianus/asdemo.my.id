@extends('master')

@section('konten')
  <h4>Selamat Datang <b>{{Auth::user()->name}}</b> <!--, Anda Login sebagai <b>{{Auth::user()->role}}</b>.--></h4>

  <div class="container"><br>
      <div class="col-md-4 col-md-offset-4">
          <h2 class="text-center"><b>CHANGE PASSWORD</b></h3>
          <hr>
          @if(session('error'))
          <div class="alert alert-danger">
              <b>Opps!</b> {{session('error')}}
          </div>
          @endif
          <form action="{{ route('actionchangepass') }}" method="post">
          @csrf
              <div class="form-group">
                  <label>Old Password</label>
                  <input type="password" name="oldpassword" class="form-control" placeholder="Old Password" required="">
              </div>
              <div class="form-group">
                  <label>New Password</label>
                  <input type="password" name="newpassword" class="form-control" placeholder="New Password" required="">
              </div>
              <div class="form-group">
                  <label>Retype New Password</label>
                  <input type="password" name="renewpassword" class="form-control" placeholder="Retype New Password" required="">
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <button type="submit" class="btn btn-primary btn-block">Change Password</button>
          </form>
      </div>
  </div>
  
@endsection