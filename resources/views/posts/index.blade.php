@extends('layouts.app')
@section('title', '記事一覧')
@section('sidebar')
    @parent
    @if(Auth::check())
    <li>{{ link_to_route('posts.create', '記事作成')}}</li>
    @endif
@endsection
@section('content')
<div class="col-xs-12">
    {{ Form::open(['route'=> 'posts.index', 'method' => 'get']) }}
    <div class="form-group">
        <div class="row">
            <div class="col-xs-10">
                {{ Form::text('keywords', '', ['type' => 'search', 'class' => 'form-control', 'placeholder' => 'content...']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::submit('search', ['class' => 'btn btn-primary col-xs-12']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-2">
            <div class="checkbox">
                {{ Form::checkbox('dateCheck', 'true', false, ['id'=> 'date_check']) }}
                <label for="date_check">日付絞り込み</label>
            </div>
        </div>
        <div class="form-group col-xs-4">
            <label>From</label>
            {{ Form::date('fromDate', $fromDate, ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-xs-4">
            <label>To</label>
            {{ Form::date('toDate', $toDate, ['class' => 'form-control']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
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
            <td>{{ link_to_route('posts.edit', '編集', [$post->id])}}</td>
            <td>
                {{ Form::open( ['route' =>['posts.destroy', $post->id],'onSubmit'=> 'return disp();','method'=>'delete']) }}
                {{ Form::submit('削除', ['class' => 'btn btn-danger', 'disabled' => !Auth::check() ]) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </table>
    <div class="text-center">
    {{$posts->links() }}
    </div>
</div>
@endsection
