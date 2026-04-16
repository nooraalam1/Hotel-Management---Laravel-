@extends('admin.partials.app')
@section('title', 'Deleted Hotels')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h3">Hotel | Deleted Hotels</h2>
                <a href="{{ route('admin.addHotel') }}" class="btn btn-info">Add Hotel</a>
                <a href="{{ route('admin.viewHotels') }}" class="btn btn-success">View Hotels</a>
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
                            <td class="align-middle"><img src="{{ asset('storage/' . $hotel->image) }}" width="100px"
                                    height="100px" alt="hotel_img"></td>
                            <td class="">
                                <form action="{{ route('admin.restoreTrashed', ['id' => $hotel->id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input class="btn btn-info mb-3 col" type="submit" value="Restore"
                                        onclick="return confirm('Are You Sure?')">
                                </form>
                                <form action="{{route('admin.permanentHotelDelete',['id'=>$hotel->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-warning col" type="submit" value="Permanent Delete"
                                        onclick="return confirm('Are You Sure?')">
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
