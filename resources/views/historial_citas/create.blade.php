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

                @if (Session::has('success'))
                    <div class="alert alert-info">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nuevo Historial de Cita</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{ route('historial_citas.store') }}" role="form">
                                {{ csrf_field() }}

                                <div class="row">
                                    <!-- Campo de Motivo -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="motivo">Motivo de la cita</label>
                                            <input type="text" name="motivo" id="motivo"
                                                class="form-control input-sm" placeholder="Motivo de la cita"
                                                value="{{ old('motivo') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Campo de Observaciones -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones</label>
                                            <textarea name="observaciones" id="observaciones" class="form-control input-sm" placeholder="Observaciones adicionales"
                                                required>{{ old('observaciones') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Campo de Duración -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="duracion">Duración</label>
                                            <input type="time" name="duracion" id="duracion" class="form-control input-sm">
                                        </div>
                                    </div>

                                    <!-- Campo de Tratamiento Realizado -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="tratamiento_realizado">Tratamiento realizado</label>
                                            <input type="text" name="tratamiento_realizado" id="tratamiento_realizado"
                                                class="form-control input-sm" placeholder="Tratamiento realizado"
                                                value="{{ old('tratamiento_realizado') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <!-- Botón para guardar -->
                                        <input type="submit" value="Guardar" class="btn btn-success btn-block">
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
