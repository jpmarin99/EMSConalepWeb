@extends('adminlte::page')

@section('title', 'EMS Conalep')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar aviso</h2>
            </div>
        </div>
    </div>
    @stop
@section('content')


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                {{ $aviso->titulo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalles:</strong>
                {{ $aviso->detalle }}
            </div>
        </div>
    </div>
@endsection
