@extends('layouts.admin')

@section('content')
	
	<h1>Media</h1>

	@include('partials.mediaCreate')
	@include('partials.mediaDelete')

@if($photos)
<form action="{{ action('AdminMediaController@deleteMedia') }}" method="post" class="form-inline">
  {{ csrf_field() }}
  {{ method_field('delete') }}
  <div class="form-group">
    <select name="checkBox" class="form-control">
      <option value="">Delete</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" name="delete_all" class="btn btn-primary">
  </div>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>All <input type="checkbox" id="options"></th>
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php ($no = 1)
      	@foreach($photos as $photo)
      		<tr>
            <td><input class="checkBoxes" type="checkbox" name="checkBox[]" value="{{ $photo->id }}"></td>
      			<td>{{ $no }}</td>
      			<td>
                	<img  height="50" src="{{ url($photo->path) }}" alt="">
      			</td>
            <td>
            	{{ $photo->created_at ? $photo->created_at->diffForHumans() : '' }}	
            </td>
            <td>

              <input type="hidden" name="photo" value="{{ $photo->id }}">

      				<div class="form-group">
      					<input type="submit" name="delete_single" value="Delete" class="btn btn-danger btn-xs">
      				</div>
            </td>
      		</tr>
      		@php ($no++)
      	@endforeach
    </tbody>
  </table>
</form>
   @endif
  <a href="{{ action('AdminMediaController@create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Upload Image</a><br><br>

  <script>
    $(document).ready(function() {

      $('#options').click(function() {

        if(this.checked) {
          $('.checkBoxes').each(function() {
            this.checked = true;
          });
        } else {

          $('.checkBoxes').each(function() {
            this.checked = false;
          })
        }
      });
    });
  </script>
@stop