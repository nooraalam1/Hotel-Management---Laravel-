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
            <form action="#" method="post" enctype="multipart/form-data">
            @csrf
                <div>
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="submit" value="Add" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection