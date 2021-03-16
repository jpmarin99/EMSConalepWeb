@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')

    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Usuario</h2>
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

    <form action="{{ route('usuarios.update',$usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="Nombre" value="{{$usuario->Nombre}}" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="Apellidos" value="{{$usuario->Apellidos}}" class="form-control" placeholder="Apellidos">
                </div>
            </div>

            <div class="form-group">
                <strong>Correo:</strong>
                <input type="email" name="Correo" class="form-control" value="{{$usuario->Correo}}" placeholder="Correo">
            </div>
        </div>

        <div class="form-group col-md-4">
            <label for="inputGrupo">Grupo</label>
            <select id="Grupo" name="Grupo" class="form-control">
                <option selected>{{$usuario->Grupo}}</option>
                <option>GAS2020</option>
                <option>MECA2020</option>
                <option>IDGS8</option>
            </select>
        </div>

        <div class="form-group">
            <strong>Matricula:</strong>
            <input type="text" name="Matricula" value="{{$usuario->Matricula}}" class="form-control" placeholder="Matricula">
        </div>

        <div class="form-group col-md-4">
            <label for="inputRol">Rol</label>
            <select id="Rol" name="Rol" class="form-control">
                <option selected>{{$usuario->Rol}}</option>
                <option>Estudiante</option>

            </select>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>

    </form>
@endsection
