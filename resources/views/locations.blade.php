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
                                {{-- {{dd($location)}} --}}
                                <h3 class="mb-0">{{ strtoupper($location->location) }}</h3>
                                <p class="">Division:{{ strtoupper($location->division) }} </p>
                                <p class="">Manager Phone:{{ $location->phone }} </p>
                                <p class="">Manager Email:{{ $location->email }} </p>
                                <a href="{{route('hotelsInDivision',['id'=>$location->id])}}" class="btn btn-primary">View All in {{strtoupper($location->division)}}</a>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
