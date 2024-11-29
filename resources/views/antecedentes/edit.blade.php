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
            @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar Antecedente Personal</h3>
                </div>
                <div class="panel-body">                    
                    <div class="table-container">
                        <!-- Formulario para editar un antecedente -->
                        <form method="POST" action="{{ route('antecedentes.update', $antecedente->id) }}" role="form">
                            {{ csrf_field() }}
                            <!-- Método PATCH para indicar actualización -->
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="row">
                                <!-- Campo de Alergia a Antibióticos -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="alergia_antibiotico">Alergia a Antibióticos</label>
                                        <select name="alergia_antibiotico" id="alergia_antibiotico" class="form-control input-sm">
                                            <option value="1" {{ old('alergia_antibiotico', $antecedente->alergia_antibiotico) == 1 ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('alergia_antibiotico', $antecedente->alergia_antibiotico) == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Campo de Alergia a Anestesia -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="alergia_anestesia">Alergia a Anestesia</label>
                                        <select name="alergia_anestesia" id="alergia_anestesia" class="form-control input-sm">
                                            <option value="1" {{ old('alergia_anestesia', $antecedente->alergia_anestesia) == 1 ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('alergia_anestesia', $antecedente->alergia_anestesia) == 0 ? 'selected' : '' }}>No</option>
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
                                            <option value="1" {{ old('asma', $antecedente->asma) == 1 ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('asma', $antecedente->asma) == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Campo de Diabetes -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="diabetes">Diabetes</label>
                                        <select name="diabetes" id="diabetes" class="form-control input-sm">
                                            <option value="1" {{ old('diabetes', $antecedente->diabetes) == 1 ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('diabetes', $antecedente->diabetes) == 0 ? 'selected' : '' }}>No</option>
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
                                            <option value="1" {{ old('hipertension', $antecedente->hipertension) == 1 ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('hipertension', $antecedente->hipertension) == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Campo de Enfermedad Cardíaca -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="enfermedad_cardiaca">Enfermedad Cardíaca</label>
                                        <select name="enfermedad_cardiaca" id="enfermedad_cardiaca" class="form-control input-sm">
                                            <option value="1" {{ old('enfermedad_cardiaca', $antecedente->enfermedad_cardiaca) == 1 ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('enfermedad_cardiaca', $antecedente->enfermedad_cardiaca) == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- Campo de Otros Antecedentes -->
                                <textarea name="otros_antecedentes" class="form-control input-sm" placeholder="Otros antecedentes">{{ old('otros_antecedentes', $antecedente->otros_antecedentes) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <!-- Botón para actualizar los cambios -->
                                    <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                                    <!-- Enlace para regresar a la lista -->
                                    <a href="{{ route('antecedentes.index') }}" class="btn btn-info btn-block">Atrás</a>
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
