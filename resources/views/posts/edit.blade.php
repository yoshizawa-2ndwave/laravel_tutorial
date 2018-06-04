@extends('layouts.app')

@section('title', 'edit')

@section('sidebar')
    @parent
    {{ link_to_route('posts.index', 'back')}}
@endsection

@section('content')
{{ Form::open( ['route' =>['posts.update', $post->id], 'method'=>'put']) }}
<div>
    {{ Form::text('title', $post->title) }}
</div>
<div>
    {{ Form::textarea('content', $post->content) }}
</div>
{{ Form::submit('update') }}
{{ Form::close() }}
@endsection
