@extends('layouts.admin')

@section('content')

	@include('partials.tinymce')
	<h1>Create a Blog</h1>

	{!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}

		@include('partials.error-message')

		<div class="form-group">
			{!! Form::label('title', 'Title') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('content', 'Content') !!}
			{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id', 'Category') !!}
			{!! Form::select('category_id', ['' => 'Select'] + $cats, null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Image') !!}
			{!! Form::file("photo_id", ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
		</div>

	{!! Form::close() !!}

@stop