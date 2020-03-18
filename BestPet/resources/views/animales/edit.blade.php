
@extends('layouts.app')

@section('content')

 <div class="container">

<form action="{{ url('/animales/' .$animales->id) }}
" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	@include('animales.form',['Modo'=>'editar'])
			
</form>
</div>
@endsection