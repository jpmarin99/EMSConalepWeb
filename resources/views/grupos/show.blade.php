@extends('adminlte::page')

@section('title', 'Informacion Grupo')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Información Grupo</h2>
            </div>
        </div>
    </div>
    @stop
@section('content')


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomenclatura:</strong>
                {{ $grupo->Nomenclatura }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Carrera:</strong>
                {{ $grupo->Carrera }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Turno:</strong>
                {{ $grupo->Turno }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cuatrimestre:</strong>
                {{ $grupo->Cuatrimestre }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Grupo:</strong>
                {{ $grupo->Grupo }}
            </div>
        </div>
    </div>
@endsection
