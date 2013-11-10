@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
    {{ Form::model($tag, ['route' => ['admin.tags.update', $tag->id], 'method' => 'PATCH', 'class' => 'form']) }}

        {{ Form::text('name', $tag->name, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
        {{ $errors->first('name', '<span class="errors">:message</span>') }}

        {{ Form::text('type', $tag->type, ['class' => 'form-control', 'placeholder' => 'Tipo']) }}
        {{ Form::text('description', $tag->description, ['class' => 'form-control', 'placeholder' => 'Descripción']) }}
        {{ Form::text('slug', $tag->slug, ['class' => 'form-control', 'placeholder' => 'Url corta']) }}
        {{ $errors->first('slug', '<span class="errors">:message</span>') }}


        {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
        </div>
    </div>
</div>
@stop

@section('styles')
@stop

@section('scripts')
@stop
