@extends('plantilla.plantilla')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left">
                            <h3>Lista de Usuarios</h3>
                        </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-info">Añadir Usuario</a>
                                <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                    <th>Cédula</th>
                                    <th>Género</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </thead>
                                <tbody>
                                    @if (isset($usuarios))
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td>{{ $usuario->cedula }}</td>
                                                <td>{{ $usuario->genero }}</td>
                                                <td>{{ $usuario->apellido }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>{{ $usuario->telefono }}</td>

                                                <td><a class="btn btn-primary btn-xs"
                                                        href="{{ route('usuarios.edit', $usuario->cedula) }}"><span
                                                            class="glyphicon glyphicon-pencil"></span></a></td>
                                                <td>
                                                    <form action="{{ route('usuarios.destroy', $usuario->cedula) }}"
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
                                            <td colspan="7">No hay registros disponibles</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
