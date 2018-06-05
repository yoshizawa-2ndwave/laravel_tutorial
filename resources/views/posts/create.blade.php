@extends('layouts.app')
@section('title', '記事作成')
@section('sidebar')
    @parent
@endsection
@section('content')
    {{ Form::open( ['route' =>'posts.store']) }}
    @include('form.postForm')
    {{ Form::close() }}
@endsection
