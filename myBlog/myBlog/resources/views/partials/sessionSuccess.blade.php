@if(Session::has('successUpdate'))

    <div class="alert alert-success alert-dismissible">
		<ul>
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session('successUpdate') }}
		</ul>
	</div>

  @endif