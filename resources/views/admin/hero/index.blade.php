@extends('admin.partials.app')
@section('title', 'Add Hero Image')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h3">Banner</h2>
                <a href="{{ route('admin.viewHero') }}" class="btn btn-info">View Image</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <form action="{{ route('admin.addHero') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Add Banner <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control dropify" required accept=".jpg,.jpeg,.png,.svg">

                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </section>
    </div>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
