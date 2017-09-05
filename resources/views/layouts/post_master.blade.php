<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/gif" sizes="16x16">


    <title>
        @yield('title' , 'Laravel Blog')
    </title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/clean-blog.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/style.css">

    @yield('stylesheets')
</head>

<body>

@include("layouts.nav")
@include("layouts.post_header")
@yield('content')

<hr>

<!-- Footer -->
@include("layouts.footer")

<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
@yield('scripts')

</body>

</html>
