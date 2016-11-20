@extends('master')

@section('title', $title)

@section('content')

    <section class="box">
        {{ Form::model($post, [ 'url' => ['post', $post->id], 'class' => 'put', 'id' => 'edit-form' ]) }}
        {{ method_field('PUT') }}
        @include('posts.form')
        {{ Form::close() }}
    </section>


@stop