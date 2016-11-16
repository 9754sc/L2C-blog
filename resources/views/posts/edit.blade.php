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
        {{ Form::model($post, [ 'url' => ['post', $post->id], 'class' => 'put', 'id' => 'edit-form' ]) }}
        {{ method_field('PUT') }}
        @include('posts.form')
        {{ Form::close() }}
    </section>


@stop