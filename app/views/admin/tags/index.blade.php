@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs">
                <li>{{link_to_route('admin.posts.index', 'Ver posts')}}</li>
                <li class="active"><a href="#">Tags</a></li>
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
                    <tr><th>ID</th><th>Name</th><th>Type</th><th></th></tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td class="col-lg-1">{{$tag->id}}</td>
                        <td>{{$tag->name}} <span class="badge">{{count($tag->posts)}}</span></td>
                        <td class="col-lg-1"><span class="label {{ $tag->type == 'tag' ? 'label-success' : 'label-default' }}">{{$tag->type}}</span></td>
                        <td class="col-lg-2">
                            {{link_to_route('admin.tags.edit', 'editar' , $tag->id, ['class' => 'btn btn-primary'])}}
                            {{ Form::open(['route' => ['admin.tags.destroy', $tag->id], 'method' => 'DELETE', 'class' => 'form-inline']) }}
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
