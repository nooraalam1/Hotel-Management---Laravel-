@extends('admin.partials.app')
@section('title', 'Add Room')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Gallery</h2>
                <a href="{{ route('admin.view_rooms') }}" class="btn btn-info">View Image</a>
                <a href="{{ route('admin.view_rooms') }}" class="btn btn-warning">Add Image</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">

        </section>
    </div>
@endsection
