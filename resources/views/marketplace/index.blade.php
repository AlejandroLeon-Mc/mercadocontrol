@extends('layouts.base')


@section('content')

@php
	$array = [
		'posicion1' => ['posicion1_1','posicion_1_2'],
		'posicion2'
	];	
	$response = SourceField::recursive($array);

	foreach ($response as $value) {
		echo $value . "</br>";		
	}

	header('Content-Type: application/json');	
@endphp


@endsection