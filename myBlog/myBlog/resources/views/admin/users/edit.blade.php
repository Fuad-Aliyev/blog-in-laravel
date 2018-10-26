@extends('layouts.admin')



@section('content')
	<h1>Edit User</h1>
	<br><br>

	<div class="col-md-3">
		@if($user->photo)
			<img src="{{ url($user->photo->path) }}" alt="" class="img-responsive img-circle">
		@else
			<img src="http://placehold.it/400x400" alt="" class="img-responsive img-circle">
		@endif
	</div>

	<div class="col-md-9"> 
		{!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}

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
				{!! Form::submit('Update', ['class' => 'btn btn-primary col-sm-6']) !!}
			</div>

		{!! Form::close() !!} 
		

		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

			<div class="form-group">
				{!! Form::submit('Delete', ['class' => 'btn btn-danger col-sm-6']) !!}
			</div>

		{!! Form::close() !!}

	</div>
@stop