@extends('master')

@section('title', $post->title)

@section('content')

    <section class="box">
        <article class="post full-post">
            <header class="post-header">
                <h1 class="box-heading">
                    <a href=" URL::current()">{{ $post->title }}</a>
                    
                    @can('edit-post', $post)
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs edit-link">EDIT</a>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs glyphicon glyphicon-remove"></a>
                    @endcan
                    
                    <time>
                        <small>/ {{ $post->created_at }}</small>
                    </time>
                </h1>
            </header>

            <div class="post-content">
                    {!! $post->RichText !!}
                <small>- written by
                    <a href="{{ url('user', [$post->user_id, $post->user->slug] ) }}">
                        {{ $post->user->name }}
                    </a>
                </small>
            </div>

            <footer class="post-footer">
                @include('partials.tags')
            </footer>

        </article>
    </section>

@stop