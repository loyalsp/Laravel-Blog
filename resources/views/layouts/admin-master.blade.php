<!DOCTYPE Html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="{{URL::to('css/admin.css')}}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    @yield('style')
</head>
<body>
@include('includes.admin-header')

    @yield('content')
<script type="text/javascript">
var baseURL = "{{URL::to('/')}}";
</script>
@yield('scripts')
</body>
</html>