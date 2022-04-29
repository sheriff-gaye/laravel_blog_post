<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body class="bg-cyan-900">
    <nav class="p-6 bg-white flex justify-between shadow-xl">
        <ul class="flex items-center">
            <li>
                <a href="{{route('home')}}" class="p-3">Home</a>
            </li>

            @auth

            <li>
                <a href="{{route('dashboard')}}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{route('post')}}"class="p-3">Post</a>
            </li>
        </ul>

        <ul class="flex items-center">
            <li>
                <a href="" class="p-3"><i class="fa fa-user text-3xl "></i> {{ auth()->user()->name}}</a>
            </li>

            <li>
                <a href="{{route('logout')}}" class="p-3">Logout</a>
            </li>

            @endauth

            @guest

            <li>
                <a href="{{route('register')}}" class="p-3">Register</a>
            </li>

            <li>
                <a href="{{route('login')}}" class="p-3">Login</a>
            </li>
            @endguest

        </ul>
    </nav>

    @yield('content')



</body>
</html>
