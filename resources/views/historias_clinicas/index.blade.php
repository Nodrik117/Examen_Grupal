@extends('plantilla.plantilla')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left">
                            <h3>Lista de Historias Clínicas</h3>
                        </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('historias_clinicas.create') }}" class="btn btn-info">Añadir Historia
                                    Clínica</a>
                                <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                    <th>Fecha Creación</th>
                                    <th>Establecimiento</th>
                                    <th>Género</th>
                                    <th>Motivo Consulta</th>
                                    <th>Problema Actual</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </thead>
                                <tbody>
                                    @forelse($historias as $historia)
                                        <!-- Reemplaza isset + foreach con forelse -->
                                        <tr>
                                            <!-- Formato de fecha -->
                                            <td>{{ \Carbon\Carbon::parse($historia->fecha_creacion_historia)->format('d/m/Y') }}
                                            </td>
                                            <td>{{ $historia->establecimiento }}</td>
                                            <td>{{ $historia->genero }}</td>
                                            <td>{{ $historia->motivo_consulta ?? 'N/A' }}</td>
                                            <td>{{ $historia->problema_actual ?? 'N/A' }}</td>

                                            <!-- Acciones de edición y eliminación -->
                                            <td>
                                                <a class="btn btn-primary btn-xs"
                                                    href="{{ route('historias_clinicas.edit', $historia->id) }}">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('historias_clinicas.destroy', $historia->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-xs" type="submit">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No hay registros disponibles</td>
                                            <!-- Número de columnas ajustado -->
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Enlaces de paginación -->
                        <div class="d-flex justify-content-center">
                            {{ $historias->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
