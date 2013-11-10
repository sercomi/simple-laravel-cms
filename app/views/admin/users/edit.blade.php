@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
    {{ Form::model( $user, ['route' => ['admin.users.update', $user->id], 'method' => 'PATCH', 'class' => 'form']) }}

        {{ Form::text('login', $user->login, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario', 'required']) }}
        {{ $errors->first('login', '<span class="errors">:message</span>') }}

        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
        {{ $errors->first('password', '<span class="errors">:message</span>') }}

        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Repetir password']) }}
        {{ $errors->first('password_confirmation', '<span class="errors">:message</span>') }}

        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
        {{ $errors->first('name', '<span class="errors">:message</span>') }}

        {{ Form::text('surname', $user->surname, ['class' => 'form-control', 'placeholder' => 'Apellidos', 'required']) }}
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
