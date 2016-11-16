<header class="post-header">
    <h1 class="box-heading">
        {{ $title }}
    </h1>
</header>

<div class="form-group">
    {{ Form::label('title', 'New post:') }}
    {{ Form::text('title', null, [
        'class'=> 'form-control',
        'placeholder' => 'New post title']
    ) }}

    {{--{{ Form::label('text', 'Text:') }}--}}
    {{ Form::textarea('text', null, [
        'class' => 'form-control',
        'placeholder' => 'Write your post',
        'rows'=>'16'
        ]
    ) }}
</div>


<div class="form-group">
    @foreach($tags as $tag)
        <label class="checkbox">
            {{ Form::checkbox('tags[]', $tag->id) }}
            {{ $tag->name }}
        </label>
    @endforeach
</div>


<div class="form-group">
    {{ Form::button($title, ['type'=>'submit', 'class'=>'btn-sm btn-primary'] ) }}
</div>

<span class="or">
    or {{ link_back('cancel') }}
</span>