@if(Session::has('mediaCreate'))

    <div class="alert alert-success alert-dismissible">
		<ul>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session('mediaCreate') }}
		</ul>
	</div>

  @endif