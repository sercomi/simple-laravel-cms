@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">

                {{ Form::open(array('route' => 'admin.sessions.store', 'class' => 'form-signin')) }}
                    {{ Form::text('login', null, array('class' => 'form-control', 'placeholder' => 'Login', 'required')) }}
                    {{ $errors->first('login', '<span class="errors">:message</span>')}}

                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required')) }}
                    {{ $errors->first('password', '<span class="errors">:message</span>')}}

                    {{ Form::submit('Entrar', array('class' => 'btn btn-lg btn-primary btn-block')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop
