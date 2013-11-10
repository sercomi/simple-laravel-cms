@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
    {{ Form::model($media, ['route' => ['admin.media.update', $media->id], 'method' => 'PATCH' , 'class' => 'form', 'files' => true]) }}

        {{ Form::text('title', $media->title, ['class' => 'form-control', 'placeholder' => 'Título']) }}
        {{$errors->first('title', '<span class="errors">:message</span>')}}

        {{ Form::label('file', 'Archivo a subir')}}
        {{ Form::file('file', '', ['class' => 'form-control', 'placeholder' => 'Archivo a subir']) }}
        {{$errors->first('file', '<span class="errors">:message</span>')}}

        {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
        </div>
    </div>
</div>
@stop

@section('styles')
@stop

@section('scripts')
<script>
(function() {
    var converter1 = Markdown.getSanitizingConverter();
    var editor1 = new Markdown.Editor(converter1);
    editor1.run();
})();
</script>
@stop
