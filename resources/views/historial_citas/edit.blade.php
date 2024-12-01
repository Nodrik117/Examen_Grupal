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
                        <h3 class="panel-title">Editar Historial de Cita</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <!-- Formulario para editar una cita -->
                            <form method="POST" action="{{ route('historial_citas.update', $historialCita->id) }}"
                                role="form">
                                {{ csrf_field() }}
                                <!-- Método PATCH para indicar actualización -->
                                <input name="_method" type="hidden" value="PATCH">

                                <div class="row">
                                    <!-- Campo de Motivo -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="motivo" id="motivo"
                                                class="form-control input-sm" placeholder="Motivo de la cita"
                                                value="{{ old('motivo', $historialCita->motivo) }}">
                                        </div>
                                    </div>

                                    <!-- Campo de Observaciones -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="observaciones" id="observaciones"
                                                class="form-control input-sm" placeholder="Observaciones"
                                                value="{{ old('observaciones', $historialCita->observaciones) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Campo de Duración -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="time" name="duracion" id="duracion" class="form-control input-sm"
                                                >
                                        </div>
                                    </div>

                                    <!-- Campo de Tratamiento Realizado -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="tratamiento_realizado" id="tratamiento_realizado"
                                                class="form-control input-sm" placeholder="Tratamiento realizado"
                                                value="{{ old('tratamiento_realizado', $historialCita->tratamiento_realizado) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <!-- Botón para guardar los cambios -->
                                        <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                                        <!-- Enlace para regresar a la lista -->
                                        <a href="{{ route('historial_citas.index') }}"
                                            class="btn btn-info btn-block">Atrás</a>
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
