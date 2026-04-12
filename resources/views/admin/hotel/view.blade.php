@extends('admin.partials.app')
@section('title', 'View Hotel')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Hotel | View Hotel</h2>
                <a href="#" class="btn btn-info">Add Hotel</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
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
                    @foreach ($hotels as $key=>$hotel)
                        <tr>
                            <td>{{$key+1 }}</td>
                            <td>{{$hotel->title }}</td>
                            <td>{{$hotel->location }}</td>
                            <td>{{$hotel->phone }}</td>
                            <td>{{$hotel->email }}</td>
                            <td>{{$hotel->status }}</td>
                            <td><img src="{{asset('storage/'.$hotel->image)}}" width="100px" height="100px" alt="hotel_img"></td>
                            <td class="d-flex justify-content-center align-items-center" style="gap: 10px">
                                <a href="#"
                                    class="btn btn-info">Edit</a>
                                    <form action="#"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-warning" type="submit" value="Delete">
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
        </section>
    </div>
@endsection
