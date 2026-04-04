@extends('admin.partials.app')
@section('title', 'View Facility')
@section('content')

    <div class="page-content">
        <x-alerts/>
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Facility | View Facilities</h2>
                <a href="{{ route('admin.addfacility') }}" class="btn btn-info">Add Facility</a>
            </div>
        </div>
    </div>
@endsection