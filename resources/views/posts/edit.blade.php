@extends('layouts.app')

@section('title', 'edit')

@section('sidebar')
    @parent
    {{ link_to_route('posts.index', 'back')}}
@endsection
@section('content')
{{ Form::open( ['route' =>['posts.update', $post->id], 'method'=>'put']) }}
@include('posts.form')
{{ Form::close() }}
@endsection
