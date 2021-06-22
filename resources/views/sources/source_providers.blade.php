@extends('welcome')

@section('title')
SOURCE PROVIDERS
@endsection

@section('body')

<div class="">
	<form method="post" action="{{ route('Source_providers_save') }}">
		@csrf
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">NOMBRE CORTO</label>
			<input class="form-control" name="short_name" required>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">NOMBRE</label>
			<input class="form-control" name="name" required>
		</div>		
		<button type="submit" class="btn btn-primary btn-block">AGREGAR</button>
	</form>
</div>
@endsection
