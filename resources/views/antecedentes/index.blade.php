@extends('plantilla.plantilla')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
          <div class="pull-left"><h3>Lista de Antecedentes Personales</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('antecedentes.create') }}" class="btn btn-info">Añadir Antecedentes</a>
                                <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                    <th>ID Antecedente</th>
                                    <th>Alergia a Antibióticos</th>
                                    <th>Alergia a Anestesia</th>
                                    <th>Asma</th>
                                    <th>Diabetes</th>
                                    <th>Hipertensión</th>
                                    <th>Enfermedad Cardíaca</th>
                                    <th>Otros Antecedentes</th>
                                    <th>Fecha de Creación</th>
                                    <th>Fecha de Actualización</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </thead>
                                <tbody>
              @if(isset($antecedentes))  <!-- Verifica si existen antecedentes -->
              @foreach($antecedentes as $antecedente)  
                                            <tr>
                                                <td>{{ $antecedente->id }}</td> <!-- ID del antecedente -->
                <td>{{ $antecedente->alergia_antibiotico ? 'Sí' : 'No' }}</td> <!-- Muestra Si o No -->
                                                <td>{{ $antecedente->alergia_anestesia ? 'Sí' : 'No' }}</td>
                                                <td>{{ $antecedente->asma ? 'Sí' : 'No' }}</td>
                                                <td>{{ $antecedente->diabetes ? 'Sí' : 'No' }}</td>
                                                <td>{{ $antecedente->hipertension ? 'Sí' : 'No' }}</td>
                                                <td>{{ $antecedente->enfermedad_cardiaca ? 'Sí' : 'No' }}</td>
                                                <td>{{ $antecedente->otros_antecedentes }}</td> <!-- Otros antecedentes -->
                                                <td>{{ $antecedente->created_at }}</td> <!-- Fecha de creación -->
                                                <td>{{ $antecedente->updated_at }}</td> <!-- Fecha de actualización -->

                <td><a class="btn btn-primary btn-xs" href="{{ route('antecedentes.edit', $antecedente->id) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                <td>
                  <form action="{{ route('antecedentes.destroy', $antecedente->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                <td colspan="12">No hay registros disponibles</td> <!-- Cambié el número de columnas -->
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
