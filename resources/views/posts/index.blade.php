@extends('layouts.app')
@section('title', '記事一覧')
@section('sidebar')
    @parent
    {{ link_to_route('posts.create', '作成')}}
@endsection
@section('content')
<table>
    <tr>
        <th>タイトル</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ link_to_route('posts.show',$post->title, [$post->id])}}</td>
        <td>{{ $post->created_at}}</td>
        <td>{{ link_to_route('posts.edit', '編集', [$post->id])}}</td>
        <td>
            {{ Form::open( ['route' =>['posts.destroy', $post->id],'onSubmit'=> 'return disp();','method'=>'delete']) }}
            {{ Form::submit('削除') }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach
</table>
@endsection
