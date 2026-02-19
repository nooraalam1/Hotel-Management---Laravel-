@extends('admin.partials.app')
@section('title','Add Room')
@section('content')

<form>

	<div>
		<label>Room Title</label> </br>
		<input type="text" name="title">
	</div>
	<div>
		<label>Description</label> </br>
		<textarea name="description"></textarea>
	</div>
	<div>
		<label>Room Title</label> </br>
		<input type="text" name="title">
	</div>
	<div>
		<label>Price</label> </br>
		<input type="number" name="price">
	</div>
	<div>
		<label>Room Type</label>
		<select name="room_type">
			<option >Select</option>
			<option value="regular">Regular</option>
			<option value="premium">Premium</option>
			<option value="deluxe">Deluxe</option>			
		</select>
	</div>
	<div>
		<label>Wifi</label>
		<select name="wifi">
			<option >Select</option>
			<option value="yes">Yes</option>
			<option selected value="no">No</option>		
		</select>
	</div>
	<div>
		<label>Upload Image</label>
		<input type="file" name="image">
	</div>
	<div>
		<input type="submit" value="Add Room">
	</div>

</form>

@endsection