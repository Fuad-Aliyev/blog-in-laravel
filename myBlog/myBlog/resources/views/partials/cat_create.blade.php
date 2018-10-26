@if(Session::has('cat_create'))
	
    <div class="alert alert-success alert-dismissible">
		<ul>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session('cat_create') }}
		</ul>
	</div>

  @endif