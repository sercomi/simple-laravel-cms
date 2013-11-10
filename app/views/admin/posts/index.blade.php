@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">Posts</a></li>
                <li>{{link_to_route('admin.tags.index', 'Ver tags')}}</li>
                <li>{{link_to_route('admin.media.index', 'Ver media')}}</li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr><th>ID</th><th>Title</th><th>Status</th><th></th></tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="col-lg-1">{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td class="col-lg-1"><span class="badge">{{$post->status}}</span></td>
                        <td class="col-lg-2">
                            {{link_to_route('admin.posts.edit', 'editar' , $post->id, ['class' => 'btn btn-primary'])}}
                            {{ Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'DELETE', 'class' => 'form-inline']) }}
                                {{ Form::submit('borrar' , ['class'=>'btn btn-danger'] )}}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('styles')
@stop

@section('scripts')
@stop
