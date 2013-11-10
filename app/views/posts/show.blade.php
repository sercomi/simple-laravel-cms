@extends('layouts.master')

@section('content')
@include('templates.navbar', ['page' => 'post'])

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            @include('templates.sidebar')
        </div>
        <div class="col-lg-9">
            <h3>{{link_to_route('posts.show', $post->title, $post->slug)}}</h3>
            {{$post->content}}

            <p>
            @foreach($post->tags as $tag)
                {{ link_to_route('tags.show', $tag->name, [$tag->slug], ['class' => 'label label-default']) }}
            @endforeach
            </p>
        </div>
    </div>
</div>
@stop
