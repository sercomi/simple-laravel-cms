@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs">
                <li>{{link_to_route('admin.posts.index', 'Ver posts')}}</li>
                <li>{{link_to_route('admin.tags.index', 'Ver tags')}}</li>
                <li class="active"><a href="#">Media</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr><th>ID</th><th>Title</th><th>Url</th><th></th></tr>
                </thead>
                <tbody>
                @foreach($medias as $media)
                    <tr>
                        <td class="col-lg-1">{{$media->id}}</td>
                        <td class="col-lg-4">{{$media->title}}</td>
                        <td class="col-lg-6">{{$media->url}}</td>
                        <td class="col-lg-1">
                            {{ Form::open(['route' => ['admin.media.destroy', $media->id], 'method' => 'DELETE', 'class' => 'form-inline']) }}
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
