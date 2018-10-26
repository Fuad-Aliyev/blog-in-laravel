@if(Session::has('cat_delete'))
	
    <div class="alert alert-danger alert-dismissible">
		<ul>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session('cat_delete') }}
		</ul>
	</div>

  @endif