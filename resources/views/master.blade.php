<?php //require_once '_inc/config.php' ?>

@include('header')

@include('partials.error')

@if( session()->has('message') )

@include('partials.message', [
'message' => session('message'),
'type' => 'success'])

@endif

@yield('content')

@include('footer')
