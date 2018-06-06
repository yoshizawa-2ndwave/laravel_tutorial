@extends('layouts.app')

@section('title', 'show')

@section('sidebar')
    @parent
    <li>{{ link_to_route('posts.edit', '記事修正', [$post->id])}}</li>
@endsection

@section('content')

<div class="">
    <h1 class="title">{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <div class="">
        <p>作成日：{{ $post->created_at }}</p>
        <p>更新日：{{ $post->updated_at }}</p>
    </div
</div>
@endsection
