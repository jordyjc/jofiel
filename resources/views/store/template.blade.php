<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Stora')</title>
    <!--Fuente de estilos-->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.0/sketchy/bootstrap.min.css" 
    rel="stylesheet">
    <!--Fuente de iconos-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    rel="stylesheet">
</head>
<body>
    @include('store.partials.nav')
    @yield('content')
    @include('store.partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!--Para ser incluida necesita un jquery-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>