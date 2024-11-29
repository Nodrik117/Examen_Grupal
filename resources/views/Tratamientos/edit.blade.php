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
                    <h3 class="panel-title">Editar Tratamiento</h3>
                </div>
                <div class="panel-body">                    
                    <div class="table-container">
                        <!-- Formulario para editar un tratamiento -->
                        <form method="POST" action="{{ route('tratamientos.update', $tratamiento->id_tratamiento) }}" role="form">
                            {{ csrf_field() }}
                            <!-- Método PATCH para indicar actualización -->
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="row">
                                <!-- Campo de Sesión -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="sesion" id="sesion" class="form-control input-sm" placeholder="Sesión del tratamiento" value="{{ old('sesion', $tratamiento->sesion) }}">
                                    </div>
                                </div>
                                
                                <!-- Campo de Complicaciones -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="complicaciones" id="complicaciones" class="form-control input-sm" placeholder="Complicaciones" value="{{ old('complicaciones', $tratamiento->complicaciones) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- Campo de Prescripciones -->
                                <textarea name="prescripciones" class="form-control input-sm" placeholder="Prescripciones">{{ old('prescripciones', $tratamiento->prescripciones) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <!-- Botón para guardar los cambios -->
                                    <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                                    <!-- Enlace para regresar a la lista -->
                                    <a href="{{ route('tratamientos.index') }}" class="btn btn-info btn-block">Atrás</a>
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
