@extends('admin.partials.app')
@section('title', 'Add Location')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Location | Add Location</h2>
                <a href="{{ route('admin.viewblog') }}" class="btn btn-info">View Location</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <form action="{{route('admin.createlocation')}}" method="POST">
                @csrf
                <div>
                    <label>Hotel Name</label>
                    <input name="hotel_name" class="form-control"></input>
                </div>
                <div>
                    <label>Location</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div>
                    <label>Division</label>
                    <div class="col-md-4 p-0">
                        <select name="division" class="form-control">
                            <option>Select</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="chattagram">Chattagram</option>
                            <option value="rajshahi">Rajshahi</option>
                            <option value="khulna">Khulna</option>
                            <option value="barishal">Barishal</option>
                            <option value="sylhet">Sylhet</option>
                            <option value="rangpur">Rangpur</option>
                            <option value="mymensingh">Mymensingh</option>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Add Location" class="btn btn-primary mt-4">
            </form>
        </section>
    </div>
@endsection
