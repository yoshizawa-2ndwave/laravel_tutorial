@extends('layouts.app')

@section('title', 'list')

@section('sidebar')
    @parent
    {{ link_to_route('posts.create', 'create')}}
@endsection

@section('content')
<table>
    <tr>
        <th>title</th>
        <th>created_at</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ link_to_route('posts.show',$post->title, [$post->id])}}</td>
        <td>{{ $post->created_at}}</td>
        <td>{{ link_to_route('posts.edit', 'Edit', [$post->id])}}</td>
    </tr>
    @endforeach
</table>
@endsection
