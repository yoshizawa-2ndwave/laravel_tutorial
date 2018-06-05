@extends('layouts.app')

@section('title', 'show')

@section('sidebar')
    @parent
    <li>{{ link_to_route('posts.edit', '記事修正', [$post->id])}}</li>
@endsection

@section('content')

<div >
    <h1 class="title">{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
</div>
@endsection
