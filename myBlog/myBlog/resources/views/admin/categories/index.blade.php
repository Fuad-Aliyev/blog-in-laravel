@extends('layouts.admin')

@section('content')
	<h1>Categories</h1>
	<div class="col-sm-6">
		@include('partials.cat_create')
		{!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
			<div class="form-group">
				@include('partials.error-message')
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>	
			<div class="form-group">
				{!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
			</div>
		{!! Form::close() !!}
	</div>
	<div class="col-sm-6">
		@include('partials.cat_update')
		@include('partials.cat_delete')
		<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>Name</th>
		        <th>Created</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		      @php ($no = 1)
		      @if($cats)
		      	@foreach($cats as $cat)
		      		<tr>
		      			<td>{{ $no }}</td>
		      			<td>{{ $cat->name }}</td>
		            <td>
		            	{{ $cat->created_at ? $cat->created_at->diffForHumans() : '' }}
		            </td>
		            <td>
		            	<a href="{{ action('AdminCategoriesController@edit', $cat->id) }}" class="btn btn-warning btn-xs active" role="button" aria-pressed="true">Edit</a>
		            </td>
		      		</tr>
		      		@php ($no++)
		      	@endforeach
		      @endif
		    </tbody>
  		</table>
	</div>
@stop