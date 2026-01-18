@extends('master')

@section('konten')
  <h4 class="text-center">LIST VISITOR</h4>
        
  <table class="table table-hover">
      <tr>
          <th>No</th>
          <th>Date</th>
          <th>Name</th>
          <th>Company</th>
          <th>Telp</th>
          <th>Email</th>
          <th>Checkin</th>
          <th>Checkout</th>
      </tr>
      @foreach($listvisitor as $s) 
      <tr>
          <td>{{$s->daily_no}}</td>
          <td>{{$s->visit_date}}</td>
          <td>{{$s->visitor_name}}</td>
          <td>{{$s->visitor_company}}</td>
          <td>{{$s->visitor_telp}}</td>
          <td>{{$s->visitor_email}}</td>
          <td>{{$s->checkin_time_at}} <br> <img src="{{ asset($s->checkin_image) }}" style="width:200px;height:160px"/></td>
          <td>{{$s->checkout_time_at}} <br> <img src="{{ asset($s->checkout_image) }}" style="width:200px;height:160px"/></td>
      </tr>
      @endforeach
  </table>
    
  
@endsection