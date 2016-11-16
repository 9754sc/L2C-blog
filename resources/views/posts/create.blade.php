@extends('master')

@section('title', $title)

@section('content')

    @include('partials.error')


    @if( session()->has('message') )

        @include('partials.message', [
            'message' => session('message'),
            'type' => 'success'])

    @endif
    <section class="box">
        {{ Form::open([ 'url' => 'post', 'class' => 'post', 'id' => 'add-form' ]) }}
            @include('posts.form')
        {{ Form::close() }}
    </section>


@stop