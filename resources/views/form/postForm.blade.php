<div class="">
    <div class="form-group">
        {{Form::label('title')}}
        {{ Form::text('title', $post->title,['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group">
        {{Form::label('content')}}
        {{ Form::textarea('content', $post->content, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('送信' ,['class' => 'btn btn-primary'])}}
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
