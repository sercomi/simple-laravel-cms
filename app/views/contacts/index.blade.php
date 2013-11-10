@extends('layouts.master')

@section('content')
@include('templates.navbar', ['page' => 'contact'])

@include('templates.flashMessage')

<div class="container">
    <div class="row">
        <div class="col-lg-5 col-lg-offset-2">
            {{Form::open(['route' => ['contact.store'], 'class' => 'form'])}}
                {{Form::text('name', '', ['class' => 'form-control','placeholder' => trans('contact.name'), 'required'])}}
                {{ $errors->first('name', '<span class="errors">:message</span>') }}

                {{Form::email('email', '', ['class' => 'form-control','placeholder' => trans('contact.email'), 'required'])}}
                {{ $errors->first('email', '<span class="errors">:message</span>') }}

                {{Form::textarea('message', '', ['class' => 'form-control','placeholder' => trans('contact.message'), 'required'])}}
                {{ $errors->first('message', '<span class="errors">:message</span>') }}

                {{Form::submit(trans('contact.send'), ['class' => 'btn btn-primary'])}}
            {{Form::close()}}
        </div>
    </div>
</div>

@stop
