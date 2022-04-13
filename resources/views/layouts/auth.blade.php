<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CollegeGram | {{ Request::is('register') ? 'Register' : 'Login' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    {{-- <div style="width: 100%; height: 100vh; display:flex; align-items: center; justify-content: center">
        <div style="width: 350px; min-height: 350px; background-color: lightslategray; border-radius: 20px;">
            @yield('content')
        </div>
    </div> --}}

    <div class="flex h-[100vh] justify-center items-center">
        @yield('content')
    </div>
</body>

</html>
