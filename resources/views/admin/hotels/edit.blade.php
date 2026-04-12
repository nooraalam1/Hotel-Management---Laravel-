@extends('admin.partials.app')
@section('title', 'Edit Hotel')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Hotel | Edit Hotel</h2>
                <a href="{{ route('admin.viewHotels') }}" class="btn btn-info">View Hotels</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <form action="{{route('admin.updateHotel',['id'=>$hotel->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{$hotel->title}}" required>
                </div>
                <div>
                    <label>Location</label>
                    <select class="form-control" name="location" required>
                    <option>{{$hotel->location}}</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->location }}">{{ $location->location }},{{$location->division}}</option>
                    @endforeach
                    </select>
                </div>
                <div style="">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control dropify" required accept=".jpg,.jpeg,.png,.svg" >
                    <div>
                        <a href="{{asset('storage/'.$hotel->image)}}" target="_blank"> View Current Image</a>
                    </div>

                </div>
                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" required value="{{$hotel->phone}}">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required value="{{$hotel->email}}">
                </div>
                <div>
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option>Select</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <input type="submit" value="Update Hotel" class="btn btn-primary mt-4">
            </form>
        </section>
    </div>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
