@extends('admin.partials.app')
@section('title', 'Add Room')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Room / Add Room</h2>
                <a href="{{ route('admin.view_rooms') }}" class="btn btn-info">View Rooms</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom block">
            <form action="{{ route('admin.add_room') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Room Title</label> </br>
                    <input type="text" name="room_title" class="form-control is-valid col-md-5" required>
                </div>
                <div>
                    <label>Description</label> </br>
                    <textarea name="description" class="form-control is-valid"></textarea>
                </div>
                <div class="d-flex ">
                    <div class="col-6 p-0">
                        <label class="col-6 p-0 form-control-label">Room Type</label>
                        <div class=" p-0">
                            <select name="room_type" class="form-control">
                                <option>Select</option>
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="deluxe">Deluxe</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <label class=" p-0 form-control-label">Wifi</label>
                        <div class="p-0">
                            <select name="wifi" class="form-control mb-3">
                                <option>Select</option>
                                <option value="yes">Yes</option>
                                <option selected value="no">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <label>Price</label> </br>
                    <input type="number" name="price" class="col-md-3 form-control is-valid">
                </div>
                <div>
                    <label>Upload Image</label> <br>
                    <input type="file" name="image" required>
                </div>

                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Add Room">
                </div>

            </form>
        </section>
    </div>
@endsection