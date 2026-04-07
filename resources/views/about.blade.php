@extends('app')
@section('title', 'About')

@section('content')
    <div class="about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="titlepage">
                        <h2>About Us</h2>
                        <p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their
                            dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their
                            software. Today it's seen all around the web; on templates, websites, and stock designs. Use our
                            generator to get your own, or read on for the authoritative history of lorem ipsum. </p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about_img">
                        <figure><img src="{{ asset('images/about.png') }}" alt="#" /></figure>
                    </div>
                </div>
            </div>
            <div class="container my-5">
                <h1 class="text-center mb-4 fw-bold">Our Facilities</h1>

                <div class="row g-4 ">

                    @foreach ($facilities as $facility)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-2">
                            <div class="card h-100 text-center shadow-sm border-0 facility-card">

                                <div class="p-3">
                                    <img src="{{ asset('storage/' . $facility->image) }}" class="img-fluid"
                                        style="max-height: 60px;">
                                </div>

                                <div class="card-body p-2">
                                    <p class="mb-0 small fw-semibold">
                                        {{ $facility->name }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
