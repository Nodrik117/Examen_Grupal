@extends('plantilla.plantilla')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Historias Clínicas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('historias_clinicas.create') }}" class="btn btn-info">Añadir Historia Clínica</a>
              <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
              <thead>
                <th>ID Historia Clínica</th>
                <th>Fecha Creación</th>
                <th>Establecimiento</th>
                <th>Género</th>
                <th>Motivo Consulta</th>
                <th>Problema Actual</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </thead>
              <tbody>
                @if(isset($historias))  <!-- Verifica si existen historias clínicas -->
                  @foreach($historias as $historia)  
                    <tr>
                      <td>{{ $historia->id_historiaclinica }}</td>
                      <td>{{ $historia->fecha_creacion_historia }}</td>
                      <td>{{ $historia->establecimiento }}</td>
                      <td>{{ $historia->genero }}</td>
                      <td>{{ $historia->motivo_consulta }}</td>
                      <td>{{ $historia->problema_actual }}</td>

                      <td><a class="btn btn-primary btn-xs" href="{{ route('historias_clinicas.edit', $historia->id_historiaclinica) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                      <td>
                        <form action="{{ route('historias_clinicas.destroy', $historia->id_historiaclinica) }}" method="post">
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="DELETE">

                          <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach 
                @else
                  <tr>
                    <td colspan="8">No hay registros disponibles</td> <!-- Cambié el número de columnas -->
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
