
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    {{--<link rel="stylesheet" href="/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="/css/main.css">--}}
</head>
<body class="{{ Request::segment(1) ?: 'home' }}">

<header class="container">


    @include('partials.error')


    @if( session()->has('message') )

        @include('partials.message', [
            'message' => session('message'),
            'type' => 'success'])

    @endif

    @include('flash::message')

    <h1>
        {{--@yield('title', isset($title) ?: '')--}}
        Cultural Fake Bloggin'
    </h1>

    @if( Auth::check() )

        <nav class="navigation">
            <div class="btn-group btn-group-sm pull-left">
                <a href="{{ url('post') }}" class="btn btn-default">all posts</a>
                <a href="{{ url('user', [Auth::id(), Auth::user()->slug] ) }}" class="btn btn-default">my posts</a>
                <a href="{{ url('post/create') }}" class="btn btn-default">add new</a>
            </div>

            <div class="btn-group btn-group-sm pull-right">
                <span class="username small">{{ Auth::user()->email }}</span>
                <a href="logout" class="btn btn-default logout">logout</a>
            </div>
        </nav>
    @else

        <nav class="navigation">
            <div class="btn-group btn-group-sm pull-right">
                <span class="username small">You are not logged in</span>
                <a href="login" class="btn btn-default logout">log in</a>
            </div>
        </nav>

    @endif
</header>

<main>
    <div class="container">