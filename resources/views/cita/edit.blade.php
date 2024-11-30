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

                        <!-- Información del Paciente -->
                        <h4 class="text-primary">Información del Paciente</h4>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="id_paciente">ID del Paciente</label>
                                    <input type="text" name="id_paciente" id="id_paciente" class="form-control input-sm" value="{{ old('id_paciente', $cita->id_paciente) }}" placeholder="Ingrese el ID del paciente">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="nombre_paciente">Nombre del Paciente</label>
                                    <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control input-sm" value="{{ old('nombre_paciente', $cita->nombre_paciente) }}" placeholder="Ingrese el nombre del paciente">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="apellido_paciente">Apellido del Paciente</label>
                                    <input type="text" name="apellido_paciente" id="apellido_paciente" class="form-control input-sm" value="{{ old('apellido_paciente', $cita->apellido_paciente) }}" placeholder="Ingrese el apellido del paciente">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control input-sm" value="{{ old('fecha_nacimiento', $cita->fecha_nacimiento) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono_paciente">Teléfono del Paciente</label>
                            <input type="text" name="telefono_paciente" id="telefono_paciente" class="form-control input-sm" value="{{ old('telefono_paciente', $cita->telefono_paciente) }}" placeholder="Ingrese el teléfono del paciente">
                        </div>

                        <!-- Información de la Cita -->
                        <h4 class="text-primary">Fecha y Hora de la Cita</h4>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="fecha_cita">Fecha de la Cita</label>
                                    <input type="date" name="fecha_cita" id="fecha_cita" class="form-control input-sm" value="{{ old('fecha_cita', $cita->fecha_cita) }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="hora_cita">Hora de la Cita</label>
                                    <input type="time" name="hora_cita" id="hora_cita" class="form-control input-sm" value="{{ old('hora_cita', $cita->hora_cita) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="especialidad">Especialidad</label>
                            <select name="especialidad" id="especialidad" class="form-control input-sm">
                                <option value="">Seleccione una especialidad</option>
                                <option value="ortodoncia" {{ old('especialidad', $cita->especialidad) == 'ortodoncia' ? 'selected' : '' }}>Ortodoncia</option>
                                <option value="endodoncia" {{ old('especialidad', $cita->especialidad) == 'endodoncia' ? 'selected' : '' }}>Endodoncia</option>
                                <option value="periodoncia" {{ old('especialidad', $cita->especialidad) == 'periodoncia' ? 'selected' : '' }}>Periodoncia</option>
                                <option value="odontopediatría" {{ old('especialidad', $cita->especialidad) == 'odontopediatría' ? 'selected' : '' }}>Odontopediatría</option>
                                <option value="cirugia_bucal" {{ old('especialidad', $cita->especialidad) == 'cirugia_bucal' ? 'selected' : '' }}>Cirugía Bucal</option>
                                <option value="implantología" {{ old('especialidad', $cita->especialidad) == 'implantología' ? 'selected' : '' }}>Implantología</option>
                                <option value="rehabilitación_oral" {{ old('especialidad', $cita->especialidad) == 'rehabilitación_oral' ? 'selected' : '' }}>Rehabilitación Oral</option>
                                <option value="odontología_general" {{ old('especialidad', $cita->especialidad) == 'odontología_general' ? 'selected' : '' }}>Odontología General</option>
                            </select>
                        </div>

                        <!-- Información del Odontólogo -->
                        <h4 class="text-primary">Información del Odontólogo</h4>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="nombre_odontologo">Nombre del Odontólogo</label>
                                    <input type="text" name="nombre_odontologo" id="nombre_odontologo" class="form-control input-sm" value="{{ old('nombre_odontologo', $cita->nombre_odontologo) }}" placeholder="Ingrese el nombre del odontólogo">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="apellido_odontologo">Apellido del Odontólogo</label>
                                    <input type="text" name="apellido_odontologo" id="apellido_odontologo" class="form-control input-sm" value="{{ old('apellido_odontologo', $cita->apellido_odontologo) }}" placeholder="Ingrese el apellido del odontólogo">
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
