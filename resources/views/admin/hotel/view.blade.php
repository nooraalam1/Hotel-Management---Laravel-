@extends('admin.partials.app')
@section('title', 'View Hotel')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Hotel | View Hotel</h2>
                <a href="#" class="btn btn-info">Add Hotel</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            @foreach ($hotels as $hotel)
                {{ $hotel->title }}
            @endforeach
        </section>
    </div>
@endsection
