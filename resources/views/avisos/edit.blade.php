@extends('adminlte::page')

@section('title', 'Editar Usuario')

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
            <h2>Editar anuncio</h2>
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

    <form action="{{ route('avisos.update',$aviso->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titulo:</strong>
                    <input type="text" name="titulo" value="{{ $aviso->titulo }}" class="form-control" placeholder="Titulo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detalles:</strong>
                    <textarea id="mytextarea" name="detalle" placeholder="Detalles">{{ $aviso->detalle }}></textarea>
                </div>
                <div class="form-group col-md-4">

                    <label for="inputGrupo">Asignado a</label>
                    <select id="Grupo" name="Grupo" class="form-control">
                        <option selected>{{ $aviso->Grupo }}</option>
                        <option>1°</option>
                        <option>2°</option>
                        <option>3°</option>

                    </select>
                </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>

    </form>
@endsection
