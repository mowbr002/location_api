@extends('layouts.app')

@section('content')
	<div class="wrap">
	
	<form method="post" action="{{$data->form_action}}" action="add" enctype="multipart/form-data">
		{{ csrf_field() }}
		<label for="file">File</label>
		<input id="file" type="file" name="file">
		<input type="submit" name="submit" value="Upload">
	</form>
    	</div>
@endsection
