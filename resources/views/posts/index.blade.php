@extends('layouts.app')
@section('title', '記事一覧')
@section('sidebar')
    @parent
    @if(Auth::check())
    <li>{{ link_to_route('posts.create', '記事作成')}}</li>
    @endif
@endsection
@section('content')
@include('form.searchForm')
<div class="col-xs-12">
    <table class="table">
        <tr>
            <th>タイトル</th>
            <th>作成日時</th>
            <th>更新日時</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ link_to_route('posts.show',$post->title, [$post->id])}}</td>
            <td>{{ $post->created_at->format('Y/m/d H:i') }}</td>
            <td>{{ $post->updated_at->format('Y/m/d H:i') }}</td>
            <td>{{ link_to_route('posts.edit', '編集', [$post->id], ['class'=> 'btn btn-default btn-sm'])}}</td>

            <td>
                {{ Form::open( ['route' =>['posts.destroy', $post->id],'onSubmit'=> 'return disp();','method'=>'delete']) }}
                {{ Form::submit('削除', ['class' => 'btn btn-danger btn-sm', 'disabled' => !Auth::check() ]) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </table>
    <div class="text-center">
    {!!$posts->appends(['keywords'=> $keyword, 'fromDate' => $fromDate, 'toDate' => $toDate])->links() !!}
    </div>
</div>
@endsection
