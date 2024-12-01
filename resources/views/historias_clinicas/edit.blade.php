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
                    <h3 class="panel-title">Editar Historia Clínica</h3>
                </div>
                <div class="panel-body">                    
                    <div class="table-container">
                        <!-- Formulario para editar una historia clínica -->
                        <form method="POST" action="{{ route('historias_clinicas.update', $historiaClinica->id_historiaclinica) }}" role="form">
                            {{ csrf_field() }}
                            <!-- Método PATCH para indicar actualización -->
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="row">
                                <!-- Campo de Fecha de Creación -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="date" name="fecha_creacion_historia" id="fecha_creacion_historia" class="form-control input-sm" value="{{ old('fecha_creacion_historia', $historiaClinica->fecha_creacion_historia) }}">
                                    </div>
                                </div>
                                
                                <!-- Campo de Establecimiento -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="establecimiento" id="establecimiento" class="form-control input-sm" placeholder="Establecimiento" value="{{ old('establecimiento', $historiaClinica->establecimiento) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Campo de Género -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="genero" id="genero" class="form-control input-sm" placeholder="Género" value="{{ old('genero', $historiaClinica->genero) }}">
                                    </div>
                                </div>

                                <!-- Campo de Motivo de Consulta -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control input-sm" placeholder="Motivo de consulta" value="{{ old('motivo_consulta', $historiaClinica->motivo_consulta) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- Campo de Problema Actual -->
                                <textarea name="problema_actual" class="form-control input-sm" placeholder="Problema Actual">{{ old('problema_actual', $historiaClinica->problema_actual) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <!-- Botón para guardar los cambios -->
                                    <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                                    <!-- Enlace para regresar a la lista -->
                                    <a href="{{ route('historias_clinicas.index') }}" class="btn btn-info btn-block">Atrás</a>
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
