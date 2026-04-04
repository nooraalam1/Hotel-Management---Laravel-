@extends('admin.partials.app')
@section('title', 'Add Location')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Location | Add Location</h2>
                <a href="{{ route('admin.viewlocations') }}" class="btn btn-info">View Location</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <form action="{{ route('admin.createlocation') }}" method="POST">
                @csrf

                <div class="">
                    <div class="col-3 p-0">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="col-3 p-0">
                        <label>Location Manager Mobile</label>
                        <input type="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="col-3 p-0">
                        <label>Location Manager Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div>
                    <label class="">Division</label>
                    <div class=" p-0 col-3">
                        <select name="division" class="form-control" required>
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
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <input type="submit" value="Add Location" class="btn btn-primary mt-4">
                </div>
            </form>
        </section>
    </div>
@endsection
