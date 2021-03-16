@extends('adminlte::page')

@section('title', 'Editar Grupo')

@section('content_header')

    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Grupo</h2>
        </div>
    </div>
    </div>
@stop
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hay algunos problemas con tu entrada.Revisala.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('grupos.update',$grupo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomenclatura:</strong>
                    <input type="text" name="Nomenclatura" value="{{$grupo->Nomenclatura}}" class="form-control" placeholder="Nomenclatura">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Carrera:</strong>
                    <input type="text" name="Carrera" value="{{$grupo->Carrera}}" class="form-control" placeholder="Carrera">
                </div>
            </div>

            <div class="form-group">
                <strong>Turno:</strong>
                <select id="Turno" name="Turno" class="form-control">
                    <option selected>{{$grupo->Turno}}</option>
                    <option>Vespertino</option>
                </select>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label for="inputCuatrimestre">Cuatrimestre</label>
            <select id="Cuatrimestre" name="Cuatrimestre" class="form-control">
                <option selected>{{$grupo->Cuatrimestre}}</option>
                <option>1°</option>
                <option>2°</option>
                <option>3°</option>
                <option>4°</option>
                <option>5°</option>
                <option>7°</option>
                <option>8°</option>
                <option>9°</option>
                <option>10°</option>
            </select>
            <div class="form-group col-md-4">
                <label for="inputGrupo">Grupo</label>
                <select id="Grupo" name="Grupo" class="form-control">
                    <option selected>{{$grupo->Grupo}}</option>
                    <option>B</option>
                    <option>C</option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </form>
@endsection
