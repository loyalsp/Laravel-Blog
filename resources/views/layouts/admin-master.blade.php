<!DOCTYPE Html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="{{URL::to('css/admin.css')}}" type="text/css">
    @yield('style')
</head>
<body>
@include('includes.admin-header')

    @yield('content')
<script type="text/javascript">
var baseURL = {{URL::to('/')}};
</script>
@yield('script')
</body>
</html>