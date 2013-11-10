@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
    {{ Form::open(['route' => ['admin.users.store'], 'class' => 'form']) }}

        {{ Form::text('login', '', ['class' => 'form-control', 'placeholder' => 'Nombre de usuario', 'required']) }}
        {{ $errors->first('login', '<span class="errors">:message</span>') }}

        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}
        {{ $errors->first('password', '<span class="errors">:message</span>') }}

        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Repetir password', 'required']) }}
        {{ $errors->first('password_confirmation', '<span class="errors">:message</span>') }}

        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
        {{ $errors->first('name', '<span class="errors">:message</span>') }}

        {{ Form::text('surname', '', ['class' => 'form-control', 'placeholder' => 'Apellidos', 'required']) }}
        {{ $errors->first('surname', '<span class="errors">:message</span>') }}

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
