@extends('layouts.admin')

@section('content')
	
	<h1>Comments</h1>

	<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Author</th>
        <th>Post</th>
        <th>Active</th>
        <th>Email</th>
        <th>Content</th>
        <th>Replies</th>
        <th>Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php ($no = 1)
      @if($comments)
      	@foreach($comments as $comment)
      		<tr>
      			<td>{{ $no }}</td>
      			<td>
      				@if($comment->photo)
                		<img  height="50" src="{{ url($comment->photo) }}" alt="">
              		@else
                		<img height="50" src="http://placehold.it/400x400" alt="">
             	 	@endif
      			</td>
            	<td><a href="{{ action('AdminUsersController@index') }}">{{ $comment->author }}</a></td>
      			<td><a href="{{ action('AdminPostsController@show', $comment->post->id) }}">{{ $comment->post->title }}</a></td>
            	<td>{{ $comment->is_active == 1 ? 'Active' : 'No Active' }}</td>
            	<td>{{ $comment->email }}</td>
	            <td><a href="{{ action('AdminPostsController@show', $comment->post->id) }}">{{ str_limit($comment->body, 10) }}</a></td>
              <td><a href="{{ action('CommentRepliesController@show', $comment->id) }}">View Replies</a></td>
            	<td>{{ $comment->created_at ? $comment->created_at->diffForHumans() : '' }}</td>
            	<td>
            		@if($comment->is_active == 1)
            			{!! Form::open(['method' => 'DELETE', 'action' => ['AdminCommentsController@destroy', $comment->id]]) !!}

							<div class="form-group">
								{!! Form::submit('Disapprove', ['class' => 'btn btn-danger btn-xs']) !!}
							</div>

						{!! Form::close() !!}
            		@else 
            			{!! Form::open(['method' => 'PATCH', 'action' => ['AdminCommentsController@update', $comment->id]]) !!}

							<div class="form-group">
								{!! Form::submit('Approve', ['class' => 'btn btn-success btn-xs']) !!}
							</div>

						{!! Form::close() !!}
            		@endif
            	</td>
      		</tr>
      		@php ($no++)
      	@endforeach
      @endif
    </tbody>
  </table>

@stop