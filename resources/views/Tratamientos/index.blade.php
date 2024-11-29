@extends('plantilla.plantilla')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Tratamientos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('tratamientos.create') }}" class="btn btn-info">Añadir Tratamientos</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID Tratamiento</th>
               <th>Sesión</th>
               <th>Complicaciones</th>
               <th>Prescripciones</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if(isset($tratamientos))  <!-- Verifica si existen tratamientos -->
              @foreach($tratamientos as $trat)  
              <tr>
                <td>{{ $trat->id_tratamiento }}</td> <!-- Utiliza el nombre correcto del campo -->
                <td>{{ $trat->sesion }}</td>
                <td>{{ $trat->complicaciones }}</td> <!-- Cambié de 'Complicaciones' a 'complicaciones' -->
                <td>{{ $trat->prescripciones }}</td>

                <td><a class="btn btn-primary btn-xs" href="{{ route('tratamientos.edit', $trat->id_tratamiento) }}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{ route('tratamientos.destroy', $trat->id_tratamiento) }}" method="post">
                   {{ csrf_field() }}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="6">No hay registros disponibles</td> <!-- Cambié el número de columnas -->
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
