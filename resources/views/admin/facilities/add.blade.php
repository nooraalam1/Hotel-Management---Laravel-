@extends('admin.partials.app')
@section('title', 'Add Facility')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Facility / Add Facility</h2>
                <a href="{{ route('admin.viewfacility') }}" class="btn btn-info">View Facilities</a>
            </div>
        </div>
        <div>
            <form action="{{ route('admin.createFacility') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <div class="col-8">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label>Image</label>
                        <input type="file" accept=".jpg,.jpeg,.png,.svg" name="image" class="dropify form-control"
                            required>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
                @error('image', 'name')
                    <h4 class="text-danger">Error</h4>
                @enderror
            </form>
        </div>
    </div>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
