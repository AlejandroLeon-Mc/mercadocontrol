@extends('welcome')

@section('title')
SOURCES ITEMS
@endsection

@section('body')
<div class="modal-body">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div>
					@if ($errors->has)
						<ul id="errors">
							@foreach ($errors->all() as $error)
									<li style="color:red; font-size: 20px;"> {{$error}} </li>
							@endforeach
						</ul>
					@endif
				</div>
					<div class="mb-3">
						<label class="form-label">BUSCAR EAN</label>
						<input class="form-control" id="ean" required>
					</div>
					<button class="btn btn-primary btn-block" onclick="onJson()">BUSCAR</button>
			</div>
			<div class="col-md-7">
				<samp id="jsonParce" class="text-justify">
															
				</samp>
			</div>
		</div>
	</div>	

</div>
@endsection

@section('script')
<script>

function onJson()
{					
	var ean = document.getElementById("ean").value;
	fetch({{ route('itemsJson') }})
	  .then(response => response.json())
	  .then(data => {
	  	var jsonParce = document.getElementById('jsonParce')
	  	jsonParce.textContent = JSON.stringify(data.body.data.GeneralInfo)
	  })	 
	  .catch(error => {
	  	console.log(error)
	  });
}

</script>

@endsection