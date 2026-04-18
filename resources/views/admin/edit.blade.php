@extends('admin.partials.app')
@section('title', 'Edit Room')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Room / Edit Room</h2>
                <a href="{{ route('admin.view_rooms') }}" class="btn btn-info">View Rooms</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom block">
            <form action="{{ route('admin.update_room',['id'=>$room->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div>
                    <label>Hotel Title</label> </br>
                    <select class="form-control" name="hotel_title">
                    <option>Select</option>
                    @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->title }}</option>
                    @endforeach
                    </select>

                </div>
                <div>
                    <label>Description</label> </br>
                    <textarea name="description" class="form-control is-valid" >{{$room->description}}</textarea>
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
                        <label class=" p-0 form-control-label">Facilities</label>
                        <div class="p-0">
                            <select name="facility" class="form-control mb-3">
                                <option>Select</option>
                                @foreach ($facilities as $facility)
                                    <option value="{{ $facility->name }}">{{ $facility->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <label>Price</label> </br>
                    <input type="number" name="price" class="col-md-3 form-control is-valid" value="{{$room->price}}">
                </div>
                <div>
                    <label>Upload Image</label> <br>
                    <input type="file" name="image" class="dropify" accept=".jpg,.jpeg,.png,.svg" required>
                </div>
                <div>
                <a href ="{{$room->image}}" target="_blank">View Current Image</a>
                </div>
                <div>
                    <label>Room No.</label>
                    <input type="text" name="room_number" class="form-control" value={{"$room->room_number"}}>
                </div>
                <div>
                    <label>Bed Type</label>
                    <select class="form-control" name="bed_type">
                    <option>Select</option>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="king">King</option>           
                    </select>
                </div>
                <div >
                    <label >Status</label>
                    <select class="form-control" name="status">
                    <option>Select</option>
                    <option value="available">Available</option>
                    <option value="booked">Booked</option>
                    <option value="maintenance">Maintenance</option>           
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Update Room">
                </div>

            </form>
        </section>
    </div>
    <script>
        $('.dropify').dropify();
    </script>
@endsection