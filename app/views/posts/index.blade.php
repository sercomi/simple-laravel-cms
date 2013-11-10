@extends('layouts.master')

@section('content')
@include('templates.navbar', ['page' => 'home'])

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            @include('templates.sidebar')
        </div>

        <div class="col-lg-9">
            @foreach($posts as $post)
                <h3>{{link_to_route('posts.show', $post->title, $post->slug)}}</h3>
                {{$post->excerpt}}
                {{link_to_route('posts.show', trans("posts.readmore"), $post->slug)}}
            @endforeach
        </div>
    </div>
</div>

@stop
