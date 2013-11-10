@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            {{ Form::model($post , ['method' => 'PATCH', 'route' => ['admin.posts.update', $post->id], 'class' => 'form']) }}

                {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Título']) }}
                {{$errors->first('title', '<span class="errors">:message</span>')}}

                {{ Form::text('slug', $post->slug, ['class' => 'form-control', 'placeholder' => 'Url corta']) }}
                {{$errors->first('slug', '<span class="errors">:message</span>')}}

                {{ Form::text('tags', implode(', ', array_pluck($post->tags, 'name')), ['class' => 'form-control', 'placeholder' => 'Tags (separados por ,)']) }}
                {{$errors->first('tags', '<span class="errors">:message</span>')}}

                <div id="wmd-button-bar"></div>
                {{ Form::textarea('content', $post->rawContent, ['class' => 'form-control', 'id' => 'wmd-input', 'placeholder' => 'Post']) }}
                {{$errors->first('content', '<span class="errors">:message</span>')}}

                <p>
                    <h4>Preview</h4>
                    <div id="wmd-preview"></div>
                </p>

                <div>{{ Form::radio('status', 'draft', $post->status == 'draft' ? true : false) }} Borrador <br />
                <div>{{ Form::radio('status', 'publish', $post->status == 'publish' ? true : false) }} Publicar</div>

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
