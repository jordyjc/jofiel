<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Stora')</title>
    <!--Fuente de estilos-->


    <!--Fuente de iconos-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two|Poiret+One" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
</head>
<body>

@if(\Session::has('message'))
@include('admin.partials.message')
@endif

@include('admin.partials.nav')
@yield('content')
@include('admin.partials.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>



</body>
</html>




