@extends('admin.partials.app')
@section('title', 'Add Hotel')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h3">Hotel | Add Hotel</h2>
                <a href="{{ route('admin.viewHotels') }}" class="btn btn-info">View Hotels</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <form action="{{ route('admin.createHotel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Location</label>
                    <select class="form-control" name="location_id" required>
                    <option>Select</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->location }}, Division: {{$location->division}}</option>
                    @endforeach
                    </select>
                </div>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="image" class="form-control dropify" required accept=".jpg,.jpeg,.png,.svg">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div>
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option >Select</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <input type="submit" value="Add Hotel" class="btn btn-primary mt-4">
            </form>
        </section>
    </div>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
