@extends('layouts.admin')



@section('content')

	@include('partials.tinymce')
	
	<h1>Edit Blog</h1>
	<br><br>

	<div class="col-md-3">
		@if($post->photo)
			<img src="{{ url($post->photo->path) }}" alt="" class="img-responsive img-circle">
		@else
			<img src="http://placehold.it/400x400" alt="" class="img-responsive img-circle">
		@endif
	</div>

	<div class="col-md-9"> 
		{!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}

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
				{!! Form::select('category_id', $cats, null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('photo_id', 'Image') !!}
				{!! Form::file("photo_id", ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Update', ['class' => 'btn btn-primary col-sm-6']) !!}
			</div>

		{!! Form::close() !!} 

		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}

			<div class="form-group">
				{!! Form::submit('Delete', ['class' => 'btn btn-danger col-sm-6']) !!}
			</div>

		{!! Form::close() !!}
		

	</div>
@stop