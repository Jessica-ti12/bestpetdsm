
@extends('layouts.app')

@section('content')

 <div class="container">

<form action="{{ url('/citas/' .$citas->id) }}
" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	@include('citas.form',['Modo'=>'editar'])
			
</form>
</div>
@endsection