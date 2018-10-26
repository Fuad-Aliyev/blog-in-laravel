@if(Session::has('cat_update'))
	
    <div class="alert alert-success alert-dismissible">
		<ul>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session('cat_update') }}
		</ul>
	</div>

  @endif