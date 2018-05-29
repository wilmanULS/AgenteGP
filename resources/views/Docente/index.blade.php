@extends('voyager::master')
@section('css')

@stop
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-documentation"></i>Mis Asignaturas
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form class="form-edit-add" role="form">

                        <!-- CSRF TOKEN -->


                        <div class="panel-footer">
                            <table id="Asignados" class="table table-striped database-tables">
                                <thead>
                                <tr>
                                    <th>Docente</th>
                                    <th>Asignatura</th>
                                    <th>Nivel</th>
                                    <th>Asignatura Antecesora</th>
                                    <th>Acciones de la tabla</th>
                                </tr>
                                </thead>
                                @foreach($consulta_docentes as $doc)
                                    <tr>
                                        <td>{{$doc->name}}</td>
                                        <td>{{$doc->as_nombre}}</td>
                                        <td>{{$doc->as_nivel}}</td>
                                        <td>{{$doc->as_antecesor}}</td>
                                        <td>
                                            <a href="funciones/{{$doc->dasg_id}}" title="definirContenido"
                                               class="btn btn-sm btn-primary pull-right edit" id="{{$doc->dasg_id}}"><i
                                                        class="voyager-edit"></i> <span>Definir Contenido</span></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>

                        {{$consulta_docentes->render()}}
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>


                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            if (confirm("esta seguro de querer eliminar este objeto "+ id)) {
                $.ajax({
                    url: "{{route('Asignatura.delete')}}",
                    method: "get",
                    data: {
                        id: id
                    }, success: function (msg) {
                        alert("Se ha eliminado con exito " + msg);
                        location.href='/Academico/designarAsignatura';
                    }
                })

            } else {
                return false;
            }
        });

    </script>


@stop





