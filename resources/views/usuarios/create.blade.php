@extends('adminlte::page')

@section('title', 'Crear Usuario')
@section('plugins.Sweetalert2')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Añadir un nuevo usuario</h2>
            </div>
        </div>
    </div>
    @stop
@section('content')

<!-- Obtencion de errores de entrada o datos nulos--->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hay unos problemas con tu entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="Nombre" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="Apellidos" class="form-control" placeholder="Apellidos">
                </div>
            </div>

            <div class="form-group">
                <strong>Correo:</strong>
                <input type="email" name="Correo" class="form-control" placeholder="Correo">
            </div>
        </div>

            <div class="form-group col-md-4">
                <label for="inputGrupo">Grupo</label>
                <select id="Grupo" name="Grupo" class="form-control">
                    <option selected>IDGS8</option>
                    <option>GAS2020</option>
                    <option>MECA2020</option>
                    <option>IDGS8</option>

                </select>
            </div>

        <div class="form-group">
            <strong>Matricula:</strong>
            <input type="text" name="Matricula" class="form-control" placeholder="Matricula">
        </div>

        <div class="form-group col-md-4">
            <label for="inputRol">Rol</label>
            <select id="Rol" name="Rol" class="form-control">
                <option selected>Tutor</option>
                <option>Estudiante</option>

            </select>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <script>
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    )
                </script>
                <button type="submit" onClick="Swal.fire();"
                        class="btn btn-success">Añadir</button>
            </div>
    </form>
@endsection
