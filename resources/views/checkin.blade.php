<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkin LogBook</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">FORM CHECKIN VISITOR</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actioncheckin')}}" method="post">
            @csrf                
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Visitor Name</label>
                    <input type="text" name="visitor_name" class="form-control" placeholder="Your Name" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-building"></i> Visitor Company</label>
                    <input type="text" name="visitor_company" class="form-control" placeholder="Your Company" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-mobile"></i> Visitor Phone</label>
                    <input type="text" name="visitor_telp" class="form-control" placeholder="Your Phone" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Visitor Email</label>
                    <input type="email" name="visitor_email" class="form-control" placeholder="Your Email" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> PIC Name</label>
                    <input type="text" name="pic_name" class="form-control" placeholder="PIC Name" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-id-badge"></i> PIC Department</label>
                    <input type="text" name="pic_department" class="form-control" placeholder="PIC Department" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-list"></i> Purpose</label>
                    <input type="text" name="purpose" class="form-control" placeholder="Purpose" required="">
                </div>
                <div class="form-group">
                    <input type=button class="btn btn-primary btn-block" value="Take Snapshot" onClick="take_snapshot()">
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <input type="hidden" name="image" class="image-tag">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div id="results">Your captured image will appear here...</div>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> CHECKIN</button>
                
            </form>
        </div>
    </div>

    <script language="JavaScript">
        Webcam.set({
            width: 200,
            height: 200,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        
        Webcam.attach( '#my_camera' );
        
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'" style="width:200px;height:160px"/>';
            } );
        }
    </script>
</body>
</html>