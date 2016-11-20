@extends('master')


@section('content')
    <div class="page-header">
        <h1>403</h1>
        <p>Forbidden!</p>
        <p>{{ $exception->getMessage() }}</p>
    </div>

@stop
