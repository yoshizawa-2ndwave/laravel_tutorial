<div class="create-form">
    <div>
        {{ Form::text('title', $post->title,['class' => 'title-form']) }}
    </div>
    <div>
        {{ Form::textarea('content', $post->content, ['class' => 'content-form']) }}
    </div>
    <div class="button-rapper">
        {{ Form::submit('送信') }}
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
