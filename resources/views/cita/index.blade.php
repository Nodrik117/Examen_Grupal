@extends('plantilla.plantilla')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left">
            <h3>Lista de Citas</h3>
          </div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('citas.create') }}" class="btn btn-info">Añadir Cita</a>
              <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordered table-striped">
             <thead>
               <th>Cédula</th>
               <th>Paciente</th>
               <th>Teléfono</th>
               <th>Fecha de Cita</th>
               <th>Hora</th>
               <th>Especialidad</th>
               <th>Odontólogo</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($citas->count())  
              @foreach($citas as $cita)  
              <tr>
                <td>{{ $cita->id_paciente}}</td>
                <td>{{ $cita->nombre_paciente }} {{ $cita->apellido_paciente }}</td>
                <td>{{ $cita->telefono_paciente }}</td>
                <td>{{ $cita->fecha_cita }}</td>
                <td>{{ $cita->hora_cita }}</td>
                <td>{{ $cita->especialidad }}</td>
                <td>{{ $cita->nombre_odontologo }} {{ $cita->apellido_odontologo }}</td>
                <td>
                  <a class="btn btn-primary btn-xs" href="{{ route('citas.edit', $cita->id) }}">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </td>
                <td>
                  <form action="{{ route('citas.destroy', $cita->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs" type="submit">
                      <span class="glyphicon glyphicon-trash"></span>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach 
              @else
              <tr>
                <td colspan="8">No hay registros!!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
      {{ $citas->links() }} <!-- Paginación -->
    </div>
  </div>
</section>
@endsection
