@if(Session::has('delete'))

    <div class="alert alert-danger alert-dismissible">
		<ul>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session('delete') }}
		</ul>
	</div>

  @endif