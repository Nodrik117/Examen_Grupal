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
                        <h3 class="panel-title">Nuevo Antecedente Personal</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <!-- Formulario para crear antecedentes -->
                            <form method="POST" action="{{ route('antecedentes.store') }}" role="form">
                                {{ csrf_field() }}

                                <div class="row">
                                    <!-- Campo de Alergia a Antibióticos -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="alergia_antibiotico">Alergia a Antibióticos</label>
                                            <select name="alergia_antibiotico" id="alergia_antibiotico"
                                                class="form-control input-sm">
                                                <option value="1"
                                                    {{ old('alergia_antibiotico') == 1 ? 'selected' : '' }}>Sí</option>
                                                <option value="0"
                                                    {{ old('alergia_antibiotico') == 0 ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Campo de Alergia a Anestesia -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="alergia_anestesia">Alergia a Anestesia</label>
                                            <select name="alergia_anestesia" id="alergia_anestesia"
                                                class="form-control input-sm">
                                                <option value="1"
                                                    {{ old('alergia_anestesia') == 1 ? 'selected' : '' }}>Sí</option>
                                                <option value="0"
                                                    {{ old('alergia_anestesia') == 0 ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Campo de Asma -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="asma">Asma</label>
                                            <select name="asma" id="asma" class="form-control input-sm">
                                                <option value="1" {{ old('asma') == 1 ? 'selected' : '' }}>Sí</option>
                                                <option value="0" {{ old('asma') == 0 ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Campo de Diabetes -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="diabetes">Diabetes</label>
                                            <select name="diabetes" id="diabetes" class="form-control input-sm">
                                                <option value="1" {{ old('diabetes') == 1 ? 'selected' : '' }}>Sí
                                                </option>
                                                <option value="0" {{ old('diabetes') == 0 ? 'selected' : '' }}>No
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Campo de Hipertensión -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="hipertension">Hipertensión</label>
                                            <select name="hipertension" id="hipertension" class="form-control input-sm">
                                                <option value="1" {{ old('hipertension') == 1 ? 'selected' : '' }}>Sí
                                                </option>
                                                <option value="0" {{ old('hipertension') == 0 ? 'selected' : '' }}>No
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Campo de Enfermedad Cardíaca -->
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="enfermedad_cardiaca">Enfermedad Cardíaca</label>
                                            <select name="enfermedad_cardiaca" id="enfermedad_cardiaca"
                                                class="form-control input-sm">
                                                <option value="1"
                                                    {{ old('enfermedad_cardiaca') == 1 ? 'selected' : '' }}>Sí</option>
                                                <option value="0"
                                                    {{ old('enfermedad_cardiaca') == 0 ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Campo de Otros Antecedentes -->
                                    <textarea name="otros_antecedentes" class="form-control input-sm" placeholder="Otros antecedentes">{{ old('otros_antecedentes') }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <!-- Botón para guardar -->
                                        <input type="submit" value="Guardar" class="btn btn-success btn-block">
                                        <!-- Enlace para regresar a la lista -->
                                        <a href="{{ route('antecedentes.index') }}"
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
