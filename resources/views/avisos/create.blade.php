@extends('adminlte::page')

@section('title', 'Crear Aviso')
@section('plugins.Sweetalert2')

@section('content_header')
    <script src="https://cdn.tiny.cloud/1/h98l405j6xsri44ea6r589dgvgp65douwg0m7ndutug3aiqa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Añadir un nuevo aviso</h2>
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

    <form action="{{ route('avisos.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Título:</strong>
                    <input type="text" name="titulo" class="form-control" placeholder="Título">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detalles:</strong>
                    <textarea id="mytextarea" name="detalle">
                     Hello, World!
                        </textarea>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="inputGrupo">Asignado a</label>
                <select id="Grupo" name="Grupo" class="form-control">
                    <option selected>Todos</option>
                    <option>IDGS8</option>
                    <option>MECA2020</option>
                    <option>INM2020</option>
                    <option>GAS2020</option>
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
