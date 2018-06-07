@extends('layouts.app')

@section('title', 'show')

@section('sidebar')
    @parent
    <li>{{ link_to_route('posts.edit', '記事修正', [$post->id])}}</li>
@endsection

@section('content')
<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">{{ $post->title }}</h5>
        </div>
        <div class="panel-body">
            <p>{{ $post->content }}</p>
        </div>
        <div class="panel-footer">
            <p>作成日：{{ $post->created_at->format('Y/m/d H:i') }} 更新日：{{ $post->updated_at->format('Y/m/d H:i') }}</p>
        </div>
    </div>
    <div class="row">
        <h4>コメント</h4>
        <div class="col-xs-6">
            @foreach ($comments as $comment )
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>{{ $comment->comment }}</p>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-1">
                            <p class="text-left">No:{{$loop->iteration}}</p>
                        </div>
                        <div class="col-xs-11">
                            <p class="text-right">name:{{ $comment->name }} created_at:{{ $comment->created_at->format('Y/m/d H:i')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
            {{ Form::open( ['route' => 'posts.comment'] ) }}
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
