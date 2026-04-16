@extends('admin.partials.app')
@section('title', 'View Hotel')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h3">Hotel | View Hotel</h2>
                <a href="{{ route('admin.addHotel') }}" class="btn btn-info">Add Hotel</a>
                <a href="{{route('admin.trashedHotels')}}" class="btn btn-success">Deleted Hotels</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            @if ($hotels->count() > 0)
                <table class="table text-center">
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($hotels as $key => $hotel)
                        <tr>
                            <td class="align-middle">{{ $key + 1 }}</td>
                            <td class="align-middle">{{ $hotel->title }}</td>
                            <td class="align-middle">{{ $hotel->location }}</td>
                            <td class="align-middle">{{ $hotel->phone }}</td>
                            <td class="align-middle">{{ $hotel->email }}</td>
                            <td class="align-middle">{{ $hotel->status }}</td>
                            <td class="align-middle"><img src="{{ asset('storage/' . $hotel->image) }}" width="100px" height="100px"
                                    alt="hotel_img"></td>
                            <td class="">
                                <a href="{{route('admin.editHotel',['id'=>$hotel->id])}}" class="btn btn-info col mb-2">Edit</a>
                                <form action="{{route('admin.deleteHotel',['id'=>$hotel->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-warning col" type="submit" value="Delete" onclick="return confirm('Are You Sure?')">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h2 class="text-danger text-center">Nothing Found!</h2>
            @endif
        </section>
    </div>
@endsection
