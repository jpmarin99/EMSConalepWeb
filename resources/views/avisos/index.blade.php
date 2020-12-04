@extends('adminlte::page')

@section('title', 'EMS Conalep')

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de avisos</h2>
            </div>

        </div>
    </div>
    @stop
@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                } );
            </script>
        <tr>
            <th>No</th>
            <th>Titulo</th>
            <th>Detalles</th>
            <th width="280px">Accion</th>
        </tr>
        @foreach ($avisos as $aviso)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $aviso->titulo }}</td>
                <td>{{ $aviso->detalle }}</td>
                <td>
                    <form action="{{ route('avisos.destroy',$aviso->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('avisos.show',$aviso->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>

                        <a class="btn btn-primary" href="{{ route('avisos.edit',$aviso->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="false"></i></a>

                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmación de eliminacion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Esta acción no se puede deshacer
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
    {!! $avisos->links() !!}
@endsection


