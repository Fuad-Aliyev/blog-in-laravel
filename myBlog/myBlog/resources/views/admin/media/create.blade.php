@extends('layouts.admin')

@section('styles')
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

@stop

@section('content')
	<h1>Upload Image</h1>

	{!! Form::open(['method' => 'POST', 'action' => 'AdminMediaController@store', 'class' => 'dropzone']) !!}

	{!! Form::close() !!}
	<br><br>

@section('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@stop

@stop