@extends('admin.partials.app')
@section('title', 'View Rooms')

@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Room / View Rooms</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">

            <table class="table">
                <tr>
                    <th>Room Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Wifi</th>
                    <th>Room Type</th>
                    <th>Action</th>
                </tr>
                @forelse ($rooms as $room)
                    <tr class="table_row">
                        <td>{{ $room->room_title }}</td>
                        <td></td>
                        <td>{{ $room->description }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->wifi }}</td>
                        <td>{{ $room->room_type }}</td>
                        <td class="d-flex" style="gap: 10px">
                            <input class="btn btn-info" type="submit" value="Edit">
                            <div>
                                <form action="{{route('admin.delete_room',['room'=>$room])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-warning" type="submit" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h4 class="d-flex justify-content-center">No Data Found</h4>
                @endforelse
            </table>
        </section>
    </div>

@endsection
