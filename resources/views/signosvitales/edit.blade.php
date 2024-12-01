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
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar Signos Vitales</h3>
                </div>
                <div class="panel-body">                    
                    <div class="table-container">
                        <!-- Formulario para editar un registro de signos vitales -->
                        <form method="POST" action="{{ route('signos-vitales.update', $signosVitales->id_signosVitales) }}" role="form">
                            {{ csrf_field() }}
                            <!-- Método PATCH para indicar actualización -->
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="row">
                                <!-- Campo de Presión Arterial -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="presion_arterial" id="presion_arterial" class="form-control input-sm" placeholder="Presión Arterial (mmHg)" value="{{ old('presion_arterial', $signosVitales->presion_arterial) }}">
                                    </div>
                                </div>
                                
                                <!-- Campo de Frecuencia Cardíaca -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="frecuencia_cardiaca" id="frecuencia_cardiaca" class="form-control input-sm" placeholder="Frecuencia Cardíaca (lpm)" value="{{ old('frecuencia_cardiaca', $signosVitales->frecuencia_cardiaca) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Campo de Temperatura -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="temperatura" id="temperatura" class="form-control input-sm" placeholder="Temperatura (°C)" value="{{ old('temperatura', $signosVitales->temperatura) }}">
                                    </div>
                                </div>

                                <!-- Campo de Frecuencia Respiratoria -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="frecuencia_respiratoria" id="frecuencia_respiratoria" class="form-control input-sm" placeholder="Frecuencia Respiratoria (rpm)" value="{{ old('frecuencia_respiratoria', $signosVitales->frecuencia_respiratoria) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <!-- Botón para guardar los cambios -->
                                    <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                                    <!-- Enlace para regresar a la lista -->
                                    <a href="{{ route('signos-vitales.index') }}" class="btn btn-info btn-block">Atrás</a>
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
