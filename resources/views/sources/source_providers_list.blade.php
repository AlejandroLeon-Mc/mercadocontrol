@extends('welcome')

@section('title')
Proveedores de items
@endsection

@section('body')
<ul>
@foreach ($list as $li)	
	<li>{{$li->name}}</li>	
@endforeach
</ul>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newSourceProvider">
	AGREGAR NUEVO
</button>
@endsection

@section('modals')
<div class="modal fade" id="newSourceProvider" tabindex="-1" aria-labelledby="newSourceProvider" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSourceProvider">PROVIDER</h5> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        	<div class="">
				<div>									
					@if ($errors->has)								
						<ul id="errors">
							@foreach ($errors->all() as $error)
									<li style="color:red; font-size: 20px;"> {{$error}} </li>
							@endforeach
						</ul>
					@endif
				</div>
				<form method="post" action="{{ route('Source_providers_save') }}">
					@csrf
					<div class="mb-3">
						<label class="form-label">NOMBRE CORTO</label>
						<input class="form-control" name="short_name" required>
					</div>
					<div class="mb-3">
						<label class="form-label">NOMBRE</label>
						<input class="form-control" name="name" required>
					</div>		
					<button type="submit" class="btn btn-primary btn-block">AGREGAR</button>
				</form>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
@if (count($errors)>0)	
	<script type="text/javascript">	
		var myModal = new bootstrap.Modal(document.getElementById('newSourceProvider'));
		myModal.show();
	</script>
@endif
@endsection		

