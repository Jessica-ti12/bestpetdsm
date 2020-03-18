
@extends('layouts.app')

@section('content')

 <div class="container">


@if(Session::has('Mensaje'))

<div class="alert-success" role="alert">
{{Session::get('Mensaje')}}
	
</div>
@endif

<a href="{{ url('productos/create') }} " class="btn btn-success" > Agregar producto</a>
<br>
<br>

<table class="table table-light table-hover">
	<thead class="thead-light">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Existencias</th>
			<th>Categoria</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($productos as $productos)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$productos->nombre}}</td>
			<td>{{$productos->precio}}</td>
			<td>{{$productos->existencias}}</td>
			<td>{{$productos->categoria}}</td>
			<td>
				<a class="btn btn-warning" href="{{ url('/productos/'.$productos->id.'/edit') }}">Editar</a>

			<form method="POST" action="{{url('/productos/'.$productos->id) }}" style="display:inline">
				{{csrf_field() }}
				{{ method_field('DELETE') }}
			<button class="btn btn-danger" type="submit" onclick="return confirm('Borrar');">Eliminar</button>
			</form>

			 </td>


		</tr>
		@endforeach
	</tbody>
</table>


</div>

@endsection