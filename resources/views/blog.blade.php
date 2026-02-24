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
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="blog_img">
                            <figure><img src="{{ asset('images/deluxe_bedroom.jpg') }}" alt="Deluxe Bedroom" /></figure>
                        </div>
                        <div class="blog_room">
                            <h3>Deluxe Bedroom</h3>
                            <span>Comfort & Elegance</span>
                            <p>Enjoy a spacious deluxe bedroom featuring a king-size bed, modern amenities, and a private
                                balcony with stunning city views. Perfect for a relaxing stay whether traveling for business
                                or leisure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="blog_img">
                            <figure><img src="{{ asset('images/family_suite.jpg') }}" alt="Family Suite" /></figure>
                        </div>
                        <div class="blog_room">
                            <h3>Family Suite</h3>
                            <span>Space for Everyone</span>
                            <p>Our family suite comes with two bedrooms, a living area, and a kitchenette. Ideal for
                                families, it provides comfort, privacy, and plenty of space to unwind after a long day of
                                sightseeing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog_box">
                        <div class="blog_img">
                            <figure><img src="{{ asset('images/eco_room.jpg') }}" alt="Eco Room" /></figure>
                        </div>
                        <div class="blog_room">
                            <h3>Eco Room</h3>
                            <span>Sustainable Stay</span>
                            <p>The Eco Room is designed for environmentally conscious travelers. Equipped with
                                energy-efficient appliances and eco-friendly materials, it provides a cozy stay while
                                minimizing your carbon footprint.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
