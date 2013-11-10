@extends('layouts.master')

@section('content')
@include('templates.navbar', ['page' => 'about'])

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            About page
        </div>
    </div>
</div>

@stop
