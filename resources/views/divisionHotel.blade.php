@extends('app')
@section('title', '')

@section('content')
    <div class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Hotels in {{($location->division)}}</h2>
                    </div>
                    <div>
                        <ol>
                            @foreach ($hotels as $hotel)
                                {{-- <li>{{$hotel->hotel_name}}</li> --}}
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
