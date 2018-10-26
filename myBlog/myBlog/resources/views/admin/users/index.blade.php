@extends('layouts.admin')

@section('content')

	<h1>Users</h1>

  @include('partials.session')

  @include('partials.sessionSuccess')

  @include('partials.successCreate')

	<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Role</th>
        <th>Joined</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php ($no = 1)
      @if($users)
      	@foreach($users as $user)
      		<tr>
      			<td>{{ $no }}</td>
            <td>
              @if($user->photo)
                <img  height="50" src="{{ url($user->photo->path) }}" alt="">
              @else
                <img height="50" src="http://placehold.it/400x400" alt="">
              @endif
            </td>
      			<td>{{ $user->name }}</td>
      			<td>{{ $user->email }}</td>
      				@if($user->is_active == 1)
      					<td>Active</td>
      				@else
      					<td>Not Active</td>
      				@endif
      			<td>{{ $user->role_id ? $user->role->name : 'No role' }}</td>
      			<td>{{ $user->created_at->diffForHumans() }}</td>
            <td>
              <a href="{{ action('AdminUsersController@edit', $user->id) }}" class="btn btn-warning btn-xs active" role="button" aria-pressed="true">Edit</a>
            </td>
      		</tr>
      		@php ($no++)
      	@endforeach
      @endif
    </tbody>
  </table>

  <a href="{{ action('AdminUsersController@create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Create User</a>
  <br><br>
  
@endsection