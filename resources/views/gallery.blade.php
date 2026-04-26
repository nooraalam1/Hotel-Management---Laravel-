@extends('app')
@section('title', 'Gallery')

@section('content')
    <div class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($images as $image)
                    <img src="{{ asset('storage/'.$image->image) }}" width="300px" alt="">
                @endforeach
            </div>
        </div>
    </div>

@endsection
