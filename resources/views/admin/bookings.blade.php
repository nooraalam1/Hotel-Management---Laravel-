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
                        <td>{{ $booking->room_id }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->start_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ \App\Models\Room::findOrFail($booking->room_id)->room_title }}</td>
                        <td>{{ \App\Models\Room::findOrFail($booking->room_id)->price }}</td>
                        <td class="d-flex">
                            <form action="{{ route('admin.booking_approve', ['id' => $booking->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <button class="btn btn-primary" @if (($booking->status)=='rejected') hidden @endif>Approve</button>
                            </form>

                            <form action="{{ route('admin.booking_reject', ['id' => $booking->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <button class="btn btn-warning " @if (($booking->status)=='rejected') hidden @endif>Reject</button>
                            </form>

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
