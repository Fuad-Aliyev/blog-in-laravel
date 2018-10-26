@extends('layouts.admin')

@section('content')
	<h1>Edit Category</h1>
		@include('partials.cat_create')
		{!! Form::model($cat, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $cat->id]]) !!}
			<div class="form-group">
				@include('partials.error-message')
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>	
			<div class="form-group">
				{!! Form::submit('Update', ['class' => 'btn btn-primary col-sm-6']) !!}
			</div>
		{!! Form::close() !!}

		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $cat->id]]) !!}

			<div class="form-group">
				{!! Form::submit('Delete', ['class' => 'btn btn-danger col-sm-6']) !!}
			</div>

		{!! Form::close() !!}
@stop