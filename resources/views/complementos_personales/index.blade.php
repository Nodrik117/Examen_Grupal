@extends('plantilla.plantilla')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left">
            <h3>Lista de Complementos Personales</h3>
          </div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('complementos_personales.create') }}" class="btn btn-info">Añadir Complemento</a>
              <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordered table-striped">
             <thead>
               <th>Labios</th>
               <th>Mejillas</th>
               <th>Maxilar Superior</th>
               <th>Maxilar Inferior</th>
               <th>Lengua</th>
               <th>Higiene Oral</th>
               <th>Estado General</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($complementos->count())  
              @foreach($complementos as $complemento)  
              <tr>
                <td>{{ $complemento->labios }}</td>
                <td>{{ $complemento->mejillas }}</td>
                <td>{{ $complemento->maxilar_superior }}</td>
                <td>{{ $complemento->maxilar_inferior }}</td>
                <td>{{ $complemento->lengua }}</td>
                <td>{{ $complemento->higiene_oral }}</td>
                <td>{{ $complemento->estado_general }}</td>
                <td>
                  <a class="btn btn-primary btn-xs" href="{{ route('complementos_personales.edit', $complemento->id) }}">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                </td>
                <td>
                  <form action="{{ route('complementos_personales.destroy', $complemento->id) }}" method="POST">
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
                <td colspan="9">No hay registros!!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
      {{ $complementos->links() }} <!-- Paginación -->
    </div>
  </div>
</section>
@endsection
