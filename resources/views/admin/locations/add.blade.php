@extends('admin.partials.app')
@section('title', 'Add Location')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Location | Add Location</h2>
                <a href="{{ route('admin.viewlocations') }}" class="btn btn-info">View Location</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <form action="{{ route('admin.createlocation') }}" method="POST">
                @csrf
                {{-- <div class="row">

                    <!-- Location -->
                    <div class="col-md-3 mb-3">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>

                    <!-- District -->
                    <div class="col-md-3 mb-3">
                        <label>District</label>
                        <select name="district_id" id="district" class="form-control" required>
                            <option value="">Select District</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}" data-division="{{ $district->division_id }}">
                                    {{ $district->district_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Division -->
                    <div class="col-md-3 mb-3">
                        <label>Division</label>
                        <input type="text" id="division" class="form-control" readonly>
                        <input type="hidden" name="division_id" id="division_id">
                    </div>

                    <!-- Phone -->
                    <div class="col-md-3 mb-3">
                        <label>Location Manager Mobile</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-3 mb-3">
                        <label>Location Manager Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                </div> --}}
                <div class="">
                    <div class="col-3 p-0">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="col-3 p-0">
                        <label>District</label>
                        <input type="text" name="district" class="form-control" required>
                    </div>
                    <div class="col-3 p-0">
                        <label class="">Division</label>
                        <input type="text" name="division" class="form-control" id="">
                    </div>
                    <div class="col-3 p-0">
                        <label>Location Manager Mobile</label>
                        <input type="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="col-3 p-0">
                        <label>Location Manager Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <input type="submit" value="Add Location" class="btn btn-primary mt-4">
                </div>
            </form>
        </section>
    </div>
@endsection
