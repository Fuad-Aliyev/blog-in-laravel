@extends('layouts.admin')


@section('content')
	<h1>Create User</h1>

	{!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

		@include('partials.error-message')

		@include('partials.passwordMismatch')

		<div class="form-group">
			{!! Form::label('name', 'Name') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email') !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role_id', 'Role') !!}
			{!! Form::select("role_id", $roles, null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Image') !!}
			{!! Form::file("photo_id", ['class' => 'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password("password", ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('passwordConfirm', 'Confirm Password') !!}
			{!! Form::password("passwordConfirm", ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create User', ['class' => 'btn btn-success']) !!}
		</div>

	{!! Form::close() !!}
@stop