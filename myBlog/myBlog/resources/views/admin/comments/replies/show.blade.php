@extends('layouts.admin')

@section('content')
	
	<h1>Comments</h1>

	<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Author</th>
        <th>View Reply</th>
        <th>Content</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
      @php ($no = 1)
      @if($replies)
      	@foreach($replies as $reply)
      		<tr>
      			<td>{{ $no }}</td>
            	<td><a href="{{ action('AdminUsersController@index') }}">{{ $reply->author }}</a></td>
              <td><a href="{{ action('AdminPostsController@show', $reply->comment->post->id) }}">View Reply</a></td>
	            <td>{{ str_limit($reply->body, 10) }}</td>
            	<td>{{ $reply->created_at ? $reply->created_at->diffForHumans() : '' }}</td>
      		</tr>
      		@php ($no++)
      	@endforeach
      @endif
    </tbody>
  </table>

@stop