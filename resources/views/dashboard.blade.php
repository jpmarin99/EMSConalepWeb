@extends('adminlte::page')
@extends('layouts.layoutsTablas')
<title>DASHBOARD</title>

@section('plugins.Datatables')
@section('plugins.Sweetalert2')

@section('content_header')


@stop
@section('content')

    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic/dist/semantic.min.css">
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="Semantic-UI-CSS-master/semantic/dist/semantic.min.js"></script>

    <!DOCTYPE html>
    <html>

    <head>
        <link href=
              "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
              rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous">
        </script>

        <script src=
                "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js">
        </script>
    </head>

    <body>
    <h4 class="ui horizontal divider header">
        <i class="newspaper outline icon"></i>
        Avisos
    </h4>

    <div style="margin-top: 20px" class="ui container">
        <div class="ui medium image">
            <div class="ui dimmer">
                <div class="content">
                    <h2 class="ui inverted header">
                        Avisos
                    </h2>
                    <a href="{{ route('avisos.index') }}"
                       class="ui primary button">
                        Ver los avisos
                    </a>
                </div>
            </div>
            <img class="ui image" src=
            "https://media.geeksforgeeks.org/wp-content/uploads/20200511124031/image30.png">
        </div>
    </div>

    <h4 class="ui horizontal divider header">
        <i class="user outline icon"></i>
        Usuarios
    </h4>
    <div style="margin-top: 20px" class="ui container">
        <div class="ui medium image">
            <div class="ui dimmer">
                <div class="content">
                    <h2 class="ui inverted header">
                        Usuarios
                    </h2>
                    <a href="{{ route('avisos.index') }}"
                       class="ui primary button">
                        Ver los usuarios
                    </a>
                </div>
            </div>
            <img class="ui image" src=
            "https://media.geeksforgeeks.org/wp-content/uploads/20200511124031/image30.png">
        </div>
    </div>


    <script>
        $('.image').dimmer({
            on: 'hover'
        });
    </script>
    </body>

    </html>

@endsection
