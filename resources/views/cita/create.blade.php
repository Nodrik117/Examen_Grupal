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
                    <h3 class="panel-title">Nueva Cita</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('citas.store') }}" role="form">
                            {{ csrf_field() }}

                            <!-- Información del Paciente -->
                            <h4 class="text-primary">Información del Paciente</h4>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="id_paciente">Cédula del Paciente</label>
                                        <input type="text" name="id_paciente" id="id_paciente" class="form-control input-sm" placeholder="Ingrese el cédula del paciente">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nombre_paciente">Nombre del Paciente</label>
                                        <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control input-sm" placeholder="Ingrese el nombre del paciente">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="apellido_paciente">Apellido del Paciente</label>
                                        <input type="text" name="apellido_paciente" id="apellido_paciente" class="form-control input-sm" placeholder="Ingrese el apellido del paciente">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono_paciente">Teléfono del Paciente</label>
                                <input type="text" name="telefono_paciente" id="telefono_paciente" class="form-control input-sm" placeholder="Ingrese el teléfono del paciente">
                            </div>

                            <!-- Información de la Cita -->
                            <h4 class="text-primary">Fecha y Hora de la Cita</h4>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_cita">Fecha de la Cita</label>
                                        <input type="date" name="fecha_cita" id="fecha_cita" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="hora_cita">Hora de la Cita</label>
                                        <input type="time" name="hora_cita" id="hora_cita" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="especialidad">Especialidad</label>
                                <select name="especialidad" id="especialidad" class="form-control input-sm">
                                    <option value="">Seleccione una especialidad</option>
                                    <option value="ortodoncia">Ortodoncia</option>
                                    <option value="endodoncia">Endodoncia</option>
                                    <option value="periodoncia">Periodoncia</option>
                                    <option value="odontopediatría">Odontopediatría</option>
                                    <option value="cirugia_bucal">Cirugía Bucal</option>
                                    <option value="implantología">Implantología</option>
                                    <option value="rehabilitación_oral">Rehabilitación Oral</option>
                                    <option value="odontología_general">Odontología General</option>
                                </select>
                            </div>

                            <!-- Información del Odontólogo -->
                            <h4 class="text-primary">Información del Odontólogo</h4>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nombre_odontologo">Nombre del Odontólogo</label>
                                        <input type="text" name="nombre_odontologo" id="nombre_odontologo" class="form-control input-sm" placeholder="Ingrese el nombre del odontólogo">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="apellido_odontologo">Apellido del Odontólogo</label>
                                        <input type="text" name="apellido_odontologo" id="apellido_odontologo" class="form-control input-sm" placeholder="Ingrese el apellido del odontólogo">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="btn btn-success btn-block">
                                    <a href="{{ route('citas.index') }}" class="btn btn-info btn-block">Atrás</a>
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
