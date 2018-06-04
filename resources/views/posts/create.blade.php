@extends('layouts.app')

@section('title', 'create')

@section('sidebar')
    @parent
    {{ link_to_route('posts.index', 'back')}}
@endsection

@section('content')
{{ Form::open( ['route' =>'posts.store']) }}
<div>
    {{ Form::text('title', $post->title) }}
</div>
<div>
    {{ Form::textarea('content', $post->content) }}
</div>
{{ Form::submit('create') }}
{{ Form::close() }}
@endsection
