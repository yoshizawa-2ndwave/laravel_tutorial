@extends('layouts.app')

@section('title', 'create')

@section('sidebar')
    @parent
    {{ link_to_route('posts.index', 'back')}}
@endsection

@section('content')
<div class="">
    {{ Form::open( ['route' =>'posts.store']) }}
    @include('posts.form')
    {{ Form::close() }}
<div>
@endsection
