@if(Session::has('password'))

    <div class="alert alert-danger alert-dismissible">
		<ul>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session('password') }}
		</ul>
	</div>

  @endif