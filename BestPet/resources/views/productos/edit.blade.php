
@extends('layouts.app')

@section('content')

 <div class="container">

<form action="{{ url('/productos/' .$productos->id) }}
" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	@include('productos.form',['Modo'=>'editar'])
			
</form>
</div>
@endsection