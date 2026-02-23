@extends('admin.partials.app')
@section('title','View Rooms')

@section('content')

 <div class="page-content">
     <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Room / View Rooms</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            @forelse ($rooms as $room)
            {{$room->room_title}}
            @empty
            <h4 class="d-flex justify-content-center">No Data Found</h4>
            @endforelse
        </section>
 </div>

@endsection
