<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout LogBook</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <div class="container text-center">
        <h2 class="text-center">LIST CHECKOUT</h2>
        
        <table class="table table-hover">
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Name</th>
                <th>Company</th>
                <th>Telp</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            @foreach($listvisitor as $s) 
            <tr>
                <td>{{$s->daily_no}}</td>
                <td>{{$s->visit_date}}</td>
                <td>{{$s->visitor_name}}</td>
                <td>{{$s->visitor_company}}</td>
                <td>{{$s->visitor_telp}}</td>
                <td>{{$s->visitor_email}}</td>
                <td><img src="{{ asset($s->checkin_image) }}" style="width:200px;height:160px"/></td>
                <td>
                <a href="/checkout/{{$s->id}}" onclick="return confirm('Apakah Anda Yakin akan checkout?');" class="btn btn-danger btn-sm"><i class="fa fa-sign-out"></i> CHECKOUT</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div> 
</body>
</html>