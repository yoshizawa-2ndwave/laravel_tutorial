@extends('layouts.app')
@section('title', '記事編集')
@section('sidebar')
    @parent
@endsection
@section('content')
    {{ Form::open( ['route' =>['posts.update', $post->id], 'method'=>'put']) }}
    @include('form.postForm')
    {{ Form::close() }}
@endsection
