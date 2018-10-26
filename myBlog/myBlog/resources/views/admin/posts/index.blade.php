@extends('layouts.admin')

@section('content')
	
	<h1>Posts</h1>

  @include('partials.postCreate')

  @include('partials.postUpdate')

  @include('partials.postDelete')

	<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Photo</th>
        <th>Title</th>
        <th>Comments</th>
        <th>Category</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php ($no = 1)
      @if($posts)
      	@foreach($posts as $post)
      		<tr>
      			<td>{{ $no }}</td>
      			<td>{{ $post->user->name }}</td>
            <td>
              @if($post->photo)
                <img  height="50" src="{{ url($post->photo->path) }}" alt="">
              @else
                <img height="50" src="http://placehold.it/400x400" alt="">
              @endif
            </td>
      			<td><a href="{{ action('AdminPostsController@show', $post->slug) }}">{{ $post->title }}</a></td>
            <td><a href="{{ action('AdminCommentsController@show', $post->id) }}">View Comments</a></td>
            <td>{{ $post->category ? $post->category->name : 'No Category' }}</td>
            <td>
              {{ $post->created_at ? $post->created_at->diffForHumans() : 'No Time'}}
            </td>
            <td>
              {{ $post->updated_at ? $post->updated_at->diffForHumans() : 'No Time'}}
            </td>
            <td>
              <a href="{{ action('AdminPostsController@edit', $post->id) }}" class="btn btn-warning btn-xs active" role="button" aria-pressed="true">Edit</a>
            </td>
      		</tr>
      		@php ($no++)
      	@endforeach
      @endif
    </tbody>
  </table>

  <a href="{{ action('AdminPostsController@create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Create Post</a>
  <br><br>

  <div class="row">
    <div class="col-sm-6 col-sm-offset-5">
      {{ $posts->render() }}
    </div>
  </div>

@stop