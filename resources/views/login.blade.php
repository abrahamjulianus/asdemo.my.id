<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ASDEMO - Login</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ config('app.url') }}/css/tailwindcss_v3.2.4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <a href="{{ config('app.url') }}">
                    <img src = "{{ config('app.url') }}/img/demo-high-resolution-logo-transparent.png" alt="Logo" width="120" height="120" />
                </a>
            </div>
            
            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                    <h1 class="text-center mt-6 text-xl font-semibold text-gray-900 dark:text-white">LOGBOOK</h1>
                    <hr>
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif

                    <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email" aria-label="email" name="email" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Password" aria-label="password" name="password" aria-describedby="basic-addon2">
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="flex justify-center">
                            <button type="submit" class="mt-6 text-xl font-semibold text-gray-900 dark:text-white btn btn-primary btn-block">Sign In</button>
                        </div>
                        <br>
                        <hr>
                        <p class="text-center">Belum punya akun? <a href="{{route('register')}}">Register</a> sekarang!</p>
                    </form>
                </div>
            </div> 
        </div> 
    </div>
    
</body>
</html>