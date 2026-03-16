@extends('admin.partials.app')
@section('title', 'Add Blog')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Blog | Add Blog</h2>
                <a href="{{ route('admin.viewblog') }}" class="btn btn-info">View Blog</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <form action="{{route('admin.addablog')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Upload Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div>
                    <label>Tagline</label>
                    <input type="text" name="tagline" class="form-control">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <input type="submit" value="Add Blog" class="btn btn-primary mt-4">
            </form>
        </section>
    </div>
@endsection
