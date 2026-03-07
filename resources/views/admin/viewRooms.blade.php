@extends('admin.partials.app')
@section('title','View Rooms')

@section('content')
	
	<h4 style="text-center">View All Rooms</h4>
	@foreach($rooms as $room)
	{{$room->room_title}}
	<img src="{{ asset('storage/' . $room->image) }}" width="200" alt="Room Image">
	@endforeach

@endsection