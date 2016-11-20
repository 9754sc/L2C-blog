@extends('master')

@section('title', $title)

@section('content')


    <section class="box">


        {{ Form::open(['route' => ['post.destroy', $post->id],
            'method' => 'delete',
            'class'=>'put',
            'id'=>'delete-form' ]) }}

            <header class="post-header">
                <h1 class="box-heading">
                    Sure? You are about to delete following:
                </h1>
            </header>

            <blockquote class="form-group">
                <h3>&ldquo;{{ $post->title }}&ldquo;</h3>
                <p class="teaser">{{ $post->teaser }}</p>
            </blockquote>

            <div class="form-group">
                {{Form::button($title,['type'=>'submit','class'=>'btn-sm btn-primary'])}}

                <span class="or">
                    or {{link_back('cancel')}}
                </span>

            </div>

        {{ Form::close() }}

    </section>


@stop