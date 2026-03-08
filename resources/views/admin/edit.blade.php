@extends('admin.partials.app')
@section('title', 'Edit Rooms')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Room / Edit Room</h2>
            </div>
        </div>

        <section class="no-padding-top no-padding-bottom">
            <form action="{{route('admin.update_room',['room'=>$room])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label>Room Title</label> </br>
                    <input type="text" name="room_title" class="form-control is-valid col-md-5" value="{{$room->room_title}}" required >
                </div>
                <div>
                    <label>Description</label> </br>
                    <textarea name="description" class="form-control is-valid" >{{$room->description}}</textarea>
                </div>
                <div>
                    <label class="col-sm-3 form-control-label">Room Type</label>
                    <div class="col-sm-5">
                        <select name="room_type" class="form-control mb-3" value="{{$room->room_type}}">
                            <option >Select</option>
                            <option value="regular" {{$room->room_type=='regular'?'selected':''}}>Regular</option>
                            <option value="premium" {{$room->room_type=='premium'?'selected':''}}>Premium</option>
                            <option value="deluxe" {{$room->room_type=='deluxe'?'selected':''}}>Deluxe</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="col-sm-3 form-control-label">Wifi</label>
                    <div class="col-sm-5">
                        <select name="wifi" class="form-control mb-3" >
                            <option >Select</option>
                            <option value="yes" {{$room->wifi == "yes"?"selected":""}}>Yes</option>
                            <option value="no" {{$room->wifi == "no"?"selected":""}}>No</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label>Price</label> </br>
                    <input type="number" name="price" class="col-md-3 form-control is-valid" value="{{$room->price}}"  required>
                </div>
                <div>
                    <img src="{{asset('storage/'.$room->image)}}" width="300" alt="">
                </div>
                <div>
                    <label>Change Image</label> <br>
                    <input type="file" name="image"  required>
                </div>

                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Update Room">
                </div>

            </form>
        </section>
    </div>

@endsection
