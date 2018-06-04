@extends('layouts.app')

@section('title', 'show')

@section('sidebar')
    @parent
    {{ link_to_route('posts.index', 'back')}}
    <td>{{ link_to_route('posts.edit', 'Edit', [$post->id])}}</td>
@endsection

@section('content')

<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

@endsection
