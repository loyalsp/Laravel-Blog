<!DOCTYPE Html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
@yield('style')
</head>
<body>
@include('includes.header')
<div class="main">
    @yield('content')
</div>
@include('includes.footer')
</body>
</html>