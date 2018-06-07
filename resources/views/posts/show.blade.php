@extends('layouts.app')

@section('title', 'show')

@section('sidebar')
    @parent
    <li>{{ link_to_route('posts.edit', '記事修正', [$post->id])}}</li>
@endsection

@section('content')
<div class="">
    <div class="row">
        <h1 class="title">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <div class="">
            <p>作成日：{{ $post->created_at->format('Y/m/d H:i') }}</p>
            <p>更新日：{{ $post->updated_at->format('Y/m/d H:i') }}</p>
        </div>
    </div>
    <div class="row">
        <h4>コメント</h4>
        <div class="col-xs-6">
            @foreach ($comments as $comment )
            <div class="row">
                <p>{{$loop->iteration}}</p>
                <p>comment:{{ $comment->comment }}</p>
                <p>name:{{ $comment->name }}</p>
                <p>date:{{ $comment->created_at->format('Y/m/d H:i') }}</p>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{ Form::open( ['url' => 'comment'] ) }}
            <div class="form-group">
                {{Form::label('name')}}
                {{ Form::text('name', '' ,['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{Form::label('comment')}}
                {{ Form::textarea('comment', '', ['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('送信' ,['class' => 'btn btn-primary'])}}
            </div>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
