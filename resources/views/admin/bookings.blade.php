@extends('admin.partials.app')
@section('title', 'Bookings')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Bookings</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <table class="table">
                <tr>
                    <th>Room ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Status</th>
                    <th>Room Title</th>
                    <th>Price</th>
                    <th>Status Update</th>
                </tr>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{$booking->room_id}}</td>
                        <td>{{$booking->name}}</td>
                        <td>{{$booking->email}}</td>
                        <td>{{$booking->phone}}</td>
                        <td>{{$booking->start_date}}</td>
                        <td>{{$booking->end_date}}</td>
                        <td>{{$booking->status}}</td>
                        <td>{{\App\Models\Room::findOrFail($booking->room_id)->room_title}}</td>
                        <td>{{\App\Models\Room::findOrFail($booking->room_id)->price}}</td>
                        <td>
                            <a href="{{route('admin.booking_approve',['id'=>$booking->room_id])}}" class="btn btn-primary form-control" >Approve</a>
                            <a href="{{route('admin.booking_reject',['id'=>$booking->room_id])}}" class="btn btn-warning form-control">Reject</a>
                        </td>
                        {{-- <td><img src="{{asset('storage/')}}/{{\App\Models\Room::findOrFail($booking->room_id)->image}}" alt="" width="100"></td> --}}
                    </tr>
                @empty
                    <h4>No Data Found</h4>
                @endforelse
            </table>
        </section>
    </div>
@endsection
