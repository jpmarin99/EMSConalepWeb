
<html>
<meta http-equiv="Content-Type" content="php/html; charset=utf-8"/>
<h5 style="text-align: center"> <strong>  AVISOS</strong></h5>
<style>
    /* spacing */

    table {
        table-layout: fixed;
        width: 100%;
        border-collapse: collapse;
        border: 3px solid purple;
    }

    thead th:nth-child(1) {
        width: 30%;
    }

    thead th:nth-child(2) {
        width: 20%;
    }

    thead th:nth-child(3) {
        width: 15%;
    }

    thead th:nth-child(4) {
        width: 35%;
    }

    th, td {
        padding: 20px;
    }
    /* typography */

    html {
        font-family: 'helvetica neue', helvetica, arial, sans-serif;
    }

    thead th, tfoot th {
        font-family: 'Rock Salt', cursive;
    }

    th {
        letter-spacing: 2px;
    }

    td {
        letter-spacing: 1px;
    }

    tbody td {
        text-align: center;
    }

    tfoot th {
        text-align: right;
    }
</style>
<table>
    <thead>
    <tr>
        <th style="text-align: center">ID</th>
        <th style="text-align: center">Título</th>
        <th style="text-align: center">Detalles</th>
        <th style="text-align: center">Asignado a </th>

    </tr>
    </thead>
    <tbody>
    <!-- Obtener todos los avisos de la bd -->
    @foreach ($avisos as $aviso)

        <td style="text-align: center" >{{ $aviso->id }}</td>
        <td style="text-align: center">{{ $aviso->titulo }}</td>
        <td style="text-align: center">{{ $aviso->detalle }}</td>
        <td style="text-align: center">{{$aviso->Grupo}}</td>
        <br>
    @endforeach
    </tbody>
</table>
</html>

