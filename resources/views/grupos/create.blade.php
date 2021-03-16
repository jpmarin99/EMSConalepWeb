@extends('adminlte::page')

@section('title', 'Crear Grupo')
@section('plugins.Sweetalert2')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Añadir un nuevo grupo</h2>
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

    <form action="{{ route('grupos.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomenclatura:</strong>
                    <input type="text" name="Nomenclatura" class="form-control" placeholder="Nomenclatura">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Carrera:</strong>
                    <input type="text" name="Carrera" class="form-control" placeholder="Carrera">
                </div>
            </div>

            <div class="form-group">
                <strong>Turno:</strong>
                <select id="Turno" name="Turno" class="form-control">
                    <option selected>Matutino</option>
                    <option>Vespertino</option>
                </select>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label for="inputCuatrimestre">Cuatrimestre</label>
            <select id="Cuatrimestre" name="Cuatrimestre" class="form-control">
                <option selected>Seleccione uno</option>
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
                    <option selected>A</option>
                    <option>B</option>
                    <option>C</option>
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
        </div>
    </form>
@endsection
