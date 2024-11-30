@extends('plantilla.plantilla')

@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
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
            @if(Session::has('success'))
            <div class="alert alert-info">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Actualizar Cita</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('citas.update', $cita->id) }}" role="form">
                        {{ csrf_field() }}
                        @method('PUT') <!-- Método para actualizar -->

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="id_paciente" id="id_paciente" class="form-control input-sm" value="{{ old('id_paciente', $cita->id_paciente) }}" placeholder="ID del Paciente">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control input-sm" value="{{ old('nombre_paciente', $cita->nombre_paciente) }}" placeholder="Nombre del Paciente">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="apellido_paciente" id="apellido_paciente" class="form-control input-sm" value="{{ old('apellido_paciente', $cita->apellido_paciente) }}" placeholder="Apellido del Paciente">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control input-sm" value="{{ old('fecha_nacimiento', $cita->fecha_nacimiento) }}" placeholder="Fecha de Nacimiento">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="telefono_paciente" id="telefono_paciente" class="form-control input-sm" value="{{ old('telefono_paciente', $cita->telefono_paciente) }}" placeholder="Teléfono del Paciente">
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="date" name="fecha_cita" id="fecha_cita" class="form-control input-sm" value="{{ old('fecha_cita', $cita->fecha_cita) }}" placeholder="Fecha de la Cita">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="time" name="hora_cita" id="hora_cita" class="form-control input-sm" value="{{ old('hora_cita', $cita->hora_cita) }}" placeholder="Hora de la Cita">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="especialidad" id="especialidad" class="form-control input-sm" value="{{ old('especialidad', $cita->especialidad) }}" placeholder="Especialidad">
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nombre_odontologo" id="nombre_odontologo" class="form-control input-sm" value="{{ old('nombre_odontologo', $cita->nombre_odontologo) }}" placeholder="Nombre del Odontólogo">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="apellido_odontologo" id="apellido_odontologo" class="form-control input-sm" value="{{ old('apellido_odontologo', $cita->apellido_odontologo) }}" placeholder="Apellido del Odontólogo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                                <a href="{{ route('citas.index') }}" class="btn btn-info btn-block">Atrás</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
