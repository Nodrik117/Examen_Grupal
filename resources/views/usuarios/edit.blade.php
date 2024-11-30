@extends('plantilla.plantilla')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <!-- Errores de validación -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Mensaje de éxito -->
                @if (Session::has('success'))
                    <div class="alert alert-info">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Editar Usuario</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <!-- Formulario para editar un usuario -->
                            <form method="POST" action="{{ route('usuarios.update', $usuario->cedula) }}" role="form">
                                {{ csrf_field() }}
                                <!-- Método PATCH para indicar actualización -->
                                <input name="_method" type="hidden" value="PATCH">

                                <div class="row">
                                    <!-- Campo de Cédula -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="cedula" id="cedula"
                                                class="form-control input-sm" placeholder="Cédula del usuario"
                                                value="{{ old('cedula', $usuario->cedula) }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Campo de Género -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="genero" id="genero"
                                                class="form-control input-sm" placeholder="Género"
                                                value="{{ old('genero', $usuario->genero) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Campo de Nombre -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="nombres" id="nombres"
                                                class="form-control input-sm" placeholder="Nombres"
                                                value="{{ old('nombres', $usuario->nombres) }}">
                                        </div>
                                    </div>
                                    <!-- Campo de Apellido -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="apellidos" id="apellidos"
                                                class="form-control input-sm" placeholder="Apellidos"
                                                value="{{ old('apellidos', $usuario->apellidos) }}">
                                        </div>
                                    </div>
                                    <!-- Campo de Email -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email"
                                                class="form-control input-sm" placeholder="Correo electrónico"
                                                value="{{ old('email', $usuario->email) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Campo de Contraseña -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control input-sm"
                                                placeholder="Contraseña (dejar en blanco si no desea cambiar)">
                                        </div>
                                    </div>

                                    <!-- Campo de Confirmar Contraseña -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control input-sm" placeholder="Confirmar contraseña">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Campo de Teléfono -->
                                    <input type="text" name="telefono" id="telefono" class="form-control input-sm"
                                        placeholder="Teléfono" value="{{ old('telefono', $usuario->telefono) }}">
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <!-- Botón para guardar los cambios -->
                                        <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                                        <!-- Enlace para regresar a la lista -->
                                        <a href="{{ route('usuarios.index') }}" class="btn btn-info btn-block">Atrás</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
