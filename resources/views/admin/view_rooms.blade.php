@extends('admin.partials.app')
@section('title', 'View Rooms')

@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Room / View Rooms</h2>
                <a href="{{ route('admin.addRoom') }}" class="btn btn-info">Add Room</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">

            <table class="table text-center">
                <tr>
                    <th>SL</th>
                    <th>Hotel Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Facility</th>
                    <th>Room Type</th>
                    <th>Room No</th>
                    <th>Bed Type</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @forelse ($rooms as $key => $room)
                    <tr class="table_row">
                        <td>{{ $key+1 }}</td>
                        <td>{{ App\Models\Hotel::findOrFail($room->hotel_title)->title }}</td>
                        <td>{{ $room->description }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->facility }}</td>
                        <td>{{ $room->room_type }}</td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->bed_type }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $room->image) }}" width="50" />
                        </td>
                        <td>{{ $room->status }}</td>
                        <td class="d-flex" style="gap: 10px">
                            <a href="{{ route('admin.editRoom', ['id' => $room->id]) }}" class="btn btn-info">Edit</a>
                            <div>
                                <form action="{{ route('admin.delete_room', ['room' => $room]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-warning" type="submit" onclick="return confirm('Are You Sure?')" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h4 class="d-flex justify-content-center">No Data Found</h4>
                @endforelse
            </table>
        </section>
        <div class="d-flex justify-content-center align-items-center">
            {{ $rooms->links() }}
        </div>
    </div>
@endsection
