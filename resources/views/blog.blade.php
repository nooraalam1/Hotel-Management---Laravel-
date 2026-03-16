@extends('app')
@section('title', 'Blog')
@section('content')

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Blog</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($blogs as $blog)
                    <div class="col-md-4">
                        <div class="blog_box">
                            <div class="blog_img">
                                <figure><img src="{{ asset('storage/' . $blog->image) }}" alt="Deluxe Bedroom" /></figure>
                            </div>
                            <div class="blog_room">
                                <h3>{{ $blog->title }}</h3>
                                <span>{{ $blog->tagline }}</span>
                                <p>{{ $blog->description }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-muted">No Data Found</h4>
                @endforelse
            </div>
        </div>
    </div>

@endsection
