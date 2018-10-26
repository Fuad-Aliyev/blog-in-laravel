@if(Session::has('created'))

    <div class="alert alert-success alert-dismissible">
		<ul>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session('created') }}
		</ul>
	</div>

  @endif