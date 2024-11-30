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
                    <h3 class="panel-title">Nuevo Complemento Personal</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('complementos_personales.store') }}" role="form">
                        {{ csrf_field() }}

                        <!-- Sección del Complemento Personal -->
                        <h4 class="text-primary">Información del Complemento</h4>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="labios">Labios</label>
                                    <input type="text" name="labios" id="labios" class="form-control input-sm" placeholder="Ingrese el estado de los labios">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="mejillas">Mejillas</label>
                                    <input type="text" name="mejillas" id="mejillas" class="form-control input-sm" placeholder="Ingrese el estado de las mejillas">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="maxilar_superior">Maxilar Superior</label>
                                    <input type="text" name="maxilar_superior" id="maxilar_superior" class="form-control input-sm" placeholder="Ingrese el estado del maxilar superior">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="maxilar_inferior">Maxilar Inferior</label>
                                    <input type="text" name="maxilar_inferior" id="maxilar_inferior" class="form-control input-sm" placeholder="Ingrese el estado del maxilar inferior">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="lengua">Lengua</label>
                                    <input type="text" name="lengua" id="lengua" class="form-control input-sm" placeholder="Ingrese el estado de la lengua">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="higiene_oral">Higiene Oral</label>
                                    <input type="text" name="higiene_oral" id="higiene_oral" class="form-control input-sm" placeholder="Ingrese el nivel de higiene oral">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="estado_general">Estado General</label>
                            <input type="text" name="estado_general" id="estado_general" class="form-control input-sm" placeholder="Ingrese el estado general">
                        </div>

                        <!-- Botones -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit" value="Guardar" class="btn btn-success btn-block">
                                <a href="{{ route('complementos_personales.index') }}" class="btn btn-info btn-block">Atrás</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
