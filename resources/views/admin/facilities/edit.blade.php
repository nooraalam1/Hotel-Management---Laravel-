@extends('admin.partials.app')
@section('title', 'Edit Facility')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Facility / Edit Facility</h2>
                <a href="{{ route('admin.viewfacility') }}" class="btn btn-info">View Facilities</a>
            </div>
        </div>
        <div>
            <form action="{{route('admin.updateFacility',['id'=>$facility->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="">
                    <div class="col-6">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $facility->name }}" required>
                        @error('name')
                            <h4 class="text-danger">{{ $message }}</h4>
                        @enderror
                    </div>
                    <div class="">
                        <label class="ml-3">Current Image</label>
                        <img src="{{ asset('storage/' . $facility->image) }}" width="70px" height="auto" alt="">
                    </div>
                    <div class="col-6">
                        <label>Change Image</label>
                        <input type="file" value="{{ $facility->image }}" accept=".jpg,.jpeg,.png,.svg" name="image"
                            class="form-control">
                        @error('image')
                            <h4 class="text-danger">{{$message}}</h4>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <input type="submit" value="Update Facility" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
@endsection
