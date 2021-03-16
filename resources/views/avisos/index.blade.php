@extends('adminlte::page')
@extends('layouts.layoutsTablas')
@section('title', 'AVISOS')

@section('plugins.Datatables')
@section('plugins.Sweetalert2')

@section('content_header')


    @stop
@section('content')

{{--Sesion para obtener el alert de exito--}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success" xmlns="">
            <p>{{ $message }}</p>
        </div>
    @endif


        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
{{---Script para Datatable--}}
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                } );
            </script>

            <body>
            <main>

                <br>
                <h5 style="text-align: left"><i class="fa fa-newspaper" aria-hidden="true"></i><strong>  AVISOS</strong>
                    <a class="btn btn-success" href="{{ route('avisos.create') }}"><i class="fa fa-plus-circle" aria-hidden="false"></i> Crear  </a>
                    <a class="btn btn-danger" href="#"><i class="fa fa-trash" aria-hidden="false"></i> Borrado masivo</a></h5>


                <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">Título</th>
            <th style="text-align: center">Detalles</th>
            <th style="text-align: center">Asignado a </th>
            <th style="text-align: center">Acción</th>

        </tr>
                </thead>
                <tbody>
                <!-- Obtener todos los avisos de la bd -->
        @foreach ($avisos as $aviso)

                <td>{{ ++$i }}</td>
                <td>{{ $aviso->titulo }}</td>
                <td>{{ $aviso->detalle }}</td>
                <td>{{$aviso->Grupo}}</td>
                <td>

                    <form action="{{ route('avisos.destroy',$aviso->id) }}" method="POST">

                        <!--<a class="btn btn-info" href="{{ route('avisos.show',$aviso->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a> -->

                        <a class="btn btn-primary" href="{{ route('avisos.edit',$aviso->id)}}"><i class="fa fa-pen" aria-hidden="true"></i></a>


                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmación de eliminación</h5>
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
                </tbody>
    </table>

    </div>
            </main>
            </body>
    {!! $avisos->links() !!}
@endsection


