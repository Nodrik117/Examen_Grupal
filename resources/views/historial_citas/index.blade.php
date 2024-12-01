@extends('plantilla.plantilla')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left">
                            <h3>Lista de Historial de Citas</h3>
                        </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('historial_citas.create') }}" class="btn btn-info">Añadir Cita</a>
                                <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                    <th>Motivo</th>
                                    <th>Observaciones</th>
                                    <th>Duración</th>
                                    <th>Tratamiento Realizado</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </thead>
                                <tbody>
                                    @if (isset($historialCitas))
                                        @foreach ($historialCitas as $historialCita)
                                            <tr>
                                                <td>{{ $historialCita->motivo }}</td>
                                                <td>{{ $historialCita->observaciones }}</td>
                                                <td>{{ $historialCita->duracion }}</td>
                                                <td>{{ $historialCita->tratamiento_realizado }}</td>

                                                <td><a class="btn btn-primary btn-xs"
                                                        href="{{ route('historial_citas.edit', $historialCita->id) }}"><span
                                                            class="glyphicon glyphicon-pencil"></span></a></td>
                                                <td>
                                                    <form
                                                        action="{{ route('historial_citas.destroy', $historialCita->id) }}"
                                                        method="post">
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">

                                                        <button class="btn btn-danger btn-xs" type="submit"><span
                                                                class="glyphicon glyphicon-trash"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">No hay registros disponibles</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
