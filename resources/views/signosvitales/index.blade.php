@extends('plantilla.plantilla')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Signos Vitales</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('signos-vitales.create') }}" class="btn btn-info">Añadir Signos Vitales</a>
              <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID</th>
               <th>Presión Arterial</th>
               <th>Frecuencia Cardíaca</th>
               <th>Temperatura</th>
               <th>Frecuencia Respiratoria</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if(isset($signosVitales) && count($signosVitales) > 0) <!-- Verifica si existen signos vitales -->
              @foreach($signosVitales as $signo)  
              <tr>
                <td>{{ $signo->id_signosVitales }}</td>
                <td>{{ $signo->presion_arterial }}</td>
                <td>{{ $signo->frecuencia_cardiaca }}</td>
                <td>{{ $signo->temperatura }}</td>
                <td>{{ $signo->frecuencia_respiratoria }}</td>

                <td>
                  <a class="btn btn-primary btn-xs" href="{{ route('signos-vitales.edit', $signo->id_signosVitales) }}">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </td>
                <td>
                  <form action="{{ route('signos-vitales.destroy', $signo->id_signosVitales) }}" method="post">
                   {{ csrf_field() }}
                   <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger btn-xs" type="submit">
                     <span class="glyphicon glyphicon-trash"></span>
                   </button>
                  </form>
                </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="7">No hay registros disponibles</td> <!-- Cambié el número de columnas -->
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
