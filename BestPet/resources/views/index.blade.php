@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Adopciones</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('libro.create') }}" class="btn btn-info" >Añadir Adopcion</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Apellidos</th>
               <th>Estado de la mascota</th>
               <th>Telefono</th>
               <th>Email</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($Adoptas->count())  
              @foreach($Adoptas as $adopta)  
              <tr>
                <td>{{$adopta->nombre}}</td>
                <td>{{$adopta->resumen}}</td>
                <td>{{$adopta->npagina}}</td>
                <td>{{$adopta->edicion}}</td>
                <td>{{$adopta->autor}}</td>
                <td>{{$adopta->precio}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('AdoptaController@edit', $adopta->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('AdoptaController@destroy', $adopta->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $Adoptas->links() }}
    </div>
  </div>
</section>

@endsection