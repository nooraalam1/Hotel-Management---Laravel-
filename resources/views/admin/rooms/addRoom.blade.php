@extends('admin.partials.app')
@section('title', 'Add Room')
@section('content')

    <div class="page-content">
        <x-alerts></x-alerts>
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
                        <label class=" p-0 form-control-label">Facilities</label>
                        <div class="p-0">
                                @foreach ($facilities as $facility)
                                    <input class="" type="checkbox" name="facility[]" value="{{ $facility->name }}">{{ $facility->name }} </input>
                                @endforeach
                        </div>
                    </div>
                </div>
                <div>
                    <label>Price</label> </br>
                    <input type="number" name="price" class="col-md-3 form-control is-valid">
                </div>
                <div>
                    <label>Upload Image</label> <br>
                    <input type="file" name="image" class="dropzone" accept=".jpg,.jpeg,.png,.svg" required>
                </div>
                <div>
                    <label>Room No.</label>
                    <input type="text" name="room_number" class="form-control">
                </div>
                <div>
                    <label>Bed Type</label>
                    <select class="form-control" name="bed_type" required>
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
                    <input type="submit" class="btn btn-primary" value="Add Room">
                </div>

            </form>
        </section>
    </div>
    <script>
  Dropzone.discover();
</script>
@endsection
