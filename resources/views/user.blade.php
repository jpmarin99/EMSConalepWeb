@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

<div class="card-body">

    <h4>Bienvenido . {{ auth()->user()->name }} </h4>
</div>
@stop
