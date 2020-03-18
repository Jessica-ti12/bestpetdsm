
@extends('layouts.app')

@section('content')

 <div class="container">

<form action="{{ url('/adopta/' .$adopta->id) }}
" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	@include('adopta.form',['Modo'=>'editar'])
			
</form>
</div>
@endsection