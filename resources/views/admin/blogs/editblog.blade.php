@extends('admin.partials.app')
@section('title', 'Edit Blog')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Blog / Edit Blog</h2>
            </div>
        </div>

        <section class="no-padding-top no-padding-bottom">
            <form action="{{route('admin.updateBlog',['blog'=>$blog->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label>Upload Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="{{$blog->title}}"class="form-control">
                </div>
                <div>
                    <label>Tagline</label>
                    <input type="text" name="tagline" value="{{$blog->tagline}}" class="form-control">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{$blog->description}}</textarea>
                </div>
                <input type="submit" value="Update Blog" class="btn btn-primary mt-4">
            </form>
        </section>
    </div>
@endsection