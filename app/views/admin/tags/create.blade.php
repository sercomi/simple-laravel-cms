@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
    {{ Form::open(['route' => ['admin.tags.store'], 'class' => 'form']) }}

        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
        {{ $errors->first('name', '<span class="errors">:message</span>') }}

        {{ Form::text('type', 'tag', ['class' => 'form-control', 'placeholder' => 'Tipo']) }}
        {{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Descripción']) }}
        {{ Form::text('slug', '', ['class' => 'form-control', 'placeholder' => 'Url corta']) }}
        {{ $errors->first('slug', '<span class="errors">:message</span>') }}


        {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
        </div>
    </div>
</div>
@stop
