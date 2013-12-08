<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Real Estate App</title>
    {{ HTML::style('css/builds/main.css') }}
    {{ HTML::style('css/builds/app.css')}}

</head>
<body>
<div class="container">
@include('partials.navigation')

<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
</div>