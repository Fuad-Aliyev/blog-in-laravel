@extends('layouts.admin')

@section('content')

	<div class="jumbotron">
		<h1>{{ $post->title }}</h1>
	</div>

	<p>
		<strong>Posted:</strong> <span class="glyphicon glyphicon-time"></span> {{ $post->created_at ? $post->created_at->diffForHumans() : '' }}
	</p>
	<hr>

	@if($post->photo)
		<img height="100" src="{{ url($post->photo->path) }}">
	@endif
	<br><br>


	<p class="lead">
		{!! $post->content !!}
	</p>

	<hr>
	<p class="lead">
		by <a href="{{ action('AdminUsersController@index') }}">{{ $post->user->name }}</a>
	</p>

	<hr>

	@if(Auth::check())

		@include('partials.comment')

		<div class="well">
			<h4>Leave a Comment</h4>

			{!! Form::open(['method' => 'POST', 'action' => 'AdminCommentsController@store']) !!}

				<input type="hidden" name="post_id" value="{{ $post->id }}">

				<div class="form-group">
					{!! Form::label('body', 'Body:') !!}
					{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '4']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	@endif

	@if(count($comments) > 0)
		<hr>
	<div class="main">
		@foreach($comments as $comment)

			<div class="media">
				<a class="pull-left" href="#">
					<img height="64" class="media-object" src="{{ Auth::user()->gravatar }}" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading">{{ $comment->author }} <small>{{ $comment->created_at ? $comment->created_at->diffForHumans() : '' }}</small></h4>
					{{ $comment->body }}
					<hr>
					@if(count($comment->replies) > 0)
						@foreach($comment->replies as $reply)
							<div class="media">
								<a class="pull-left" href="#">
									<img height="64" class="media-object" src="{{ $reply->photo ? url($comment->photo) : 'http://placehold.it/64x64' }}" alt="">
								</a>
								<div class="media-body">
									<h4 class="media-heading">{{ $reply->author }} <small>{{ $reply->created_at ? $reply->created_at->diffForHumans() : '' }}</small></h4>
									{{ $reply->body }}
									<hr>
								</div>

						@endforeach
					@endif
								{!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}

								<input type="hidden" name="comment_id" value="{{ $comment->id }}">

									<div class="form-group">
										{!! Form::label('body', 'Reply:') !!}
										{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '1']) !!}
									</div>

									<div class="form-group">
										{!! Form::submit('Answer', ['class' => 'btn btn-primary']) !!}
									</div>

								{!! Form::close() !!}
							</div>
				</div>
			</div>
			<hr>
		@endforeach
	</div>
	@endif

@stop