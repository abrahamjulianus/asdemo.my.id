@extends('master')

@section('konten')
  <h4>Selamat Datang, <b>{{Auth::user()->name}}</b> <!--, Anda Login sebagai <b>{{Auth::user()->role}}</b>.--></h4>

  <div class="container text-center">
    <div class="card">
      <div class="card-header"><b>Total Visitor</b></div>
      <div class="card-body">
        <h1 class="card-title"><b>{{$allvisitor}}</b></h1>
        <p class="card-text">Person</p>
      </div>
    </div>
  </div>
  <br>
  <div class="container text-center">
  <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header"><b>Total @Building</b></div>
          <div class="card-body">
            <h1 class="card-title"><b>{{$visitorstay}}</b></h1>
            <p class="card-text">Person</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header"><b>Total Checkout</b></div>
          <div class="card-body">
            <h1 class="card-title"><b>{{$visitorcheckout}}</b></h1>
            <p class="card-text">Person</p>
          </div>
        </div>
      </div>
    </div>    
  </div>
    
  
@endsection