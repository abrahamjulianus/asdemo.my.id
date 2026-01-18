<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Akun asdemo.my.id</title>
</head>
<body>
    <p>Halo <b>{{$details['name']}}</b>!</p>
    <p>Berikut ini adalah Data Anda:</p>
    <table>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{$details['email']}}</td>
      </tr>
      <tr>
        <td>Website</td>
        <td>:</td>
        <td>{{$details['website']}}</td>
      </tr>
      <tr>
        <td>Tanggal Register</td>
        <td>:</td>
        <td>{{$details['datetime']}}</td>
      </tr>
    </table>

    <center>
      <h3>Copy link di bawah ini ke browser Anda untuk Verifikasi Akun:</h3>
      <b style="color:blue">{{$details['url']}}</b>
    </center>

  <p>Terima kasih telah melakukan registrasi.</p>
</body>
</html>