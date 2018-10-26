@if(Session::has('comment_create'))
	
    <div class="alert alert-success alert-dismissible">
		<ul>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session('comment_create') }}
		</ul>
	</div>

  @endif