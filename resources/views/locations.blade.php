@extends('app')
@section('title', 'Locations')

@section('content')
    <div class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Locations</h2>
                    </div>
                    <div class="row">
                        @foreach ($locations as $location)
                        <div class="card col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center" >
                            <img src="{{asset('/images/location.jpg')}}" width="200px" alt="location">
                            <div class="card-body text-center">

                                <h3 class="card-title">{{ strtoupper($location->division) }}</h3>
                                <p class="card-text">Total Hotels in the Division: </p>
                                <a href="#" class="btn btn-primary">View All Hotels</a>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
