<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="title">
            <h1 class="h5">{{ auth()->user()->name }}</h1>
            <p>Created: {{ auth()->user()->created_at }}</p>
        </div>
    </div>

    <ul class="list-unstyled">
        <li class=""><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-tachometer"
                    aria-hidden="true"></i>Dashboard </a></li>
        <li>
            <a href="{{ route('home') }}"> <i class="fa fa-external-link-square" aria-hidden="true"></i>Go to Home Page
            </a>
        </li>
        <li>
            <a href="#location" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-map-marker"
                    aria-hidden="true"></i>Locations </a>
            <ul id="location" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.addlocation') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                        Location</a></li>
                <li><a href="{{ route('admin.viewlocations') }}"><i class="fa fa-eye" aria-hidden="true"></i>View
                        Locations</a></li>
            </ul>
        </li>
        <li>
            <a href="#main" aria-expanded="false" data-toggle="collapse"><i class="fa fa-hospital-o"
                    aria-hidden="true"></i>Hotels & Rooms</a>
            <ul id="main" class="collapse list-unstyled">
                <li><a href="#hotels" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-university"
                            aria-hidden="true"></i>Hotels </a>
                    <ul id="hotels" class="collapse list-unstyled ">
                        <li><a href="{{ route('admin.addHotel') }}"> <i class="fa fa-plus-circle" aria-hidden="true"></i>Add Hotel</a></li>
                        <li><a href="{{ route('admin.viewHotels') }}"><i class="fa fa-eye" aria-hidden="true"></i>View
                                Hotels</a></li>
                        <li><a href="{{ route('admin.trashedHotels') }}"><i class="fa fa-trash" aria-hidden="true"></i>Deleted
                                Hotels</a></li>
                    </ul>
                </li>
                <li><a href="#rooms" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-bed"
                            aria-hidden="true"></i>Rooms </a>
                    <ul id="rooms" class="collapse list-unstyled ">
                        <li><a href="{{ route('admin.addRoom') }}"> <i class="fa fa-plus-circle"
                                    aria-hidden="true"></i>Add Room</a></li>
                        <li><a href="{{ route('admin.view_rooms') }}"><i class="fa fa-eye" aria-hidden="true"></i>View
                                Rooms</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        {{-- facilities --}}
        <li>
            <a href="#facilities" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-bath" aria-hidden="true"></i>Facilities </a>
            <ul id="facilities" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.addfacility') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Facilities</a></li>
                <li><a href="{{ route('admin.viewfacility') }}"><i class="fa fa-eye" aria-hidden="true"></i>View Facilities</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.bookings') }}"> <i class="icon-logout"></i>Booking Management </a>
        </li>
        <li><a href="#img" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-picture-o"
                    aria-hidden="true"></i>Image Management</a>
            <ul id="img" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.banner') }}"><i class="fa fa-file-image-o"
                            aria-hidden="true"></i>Banner</a></li>
                <li><a href="{{ route('admin.gallery') }}"><i class="fa fa-file-image-o"
                            aria-hidden="true"></i>Gallery</a></li>
            </ul>
        </li>
        <li><a href="#blog" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"
                    aria-hidden="true"></i>Blog </a>
            <ul id="blog" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.addblog') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add
                        Blog</a></li>
                <li><a href="{{ route('admin.viewblog') }}"><i class="fa fa-eye" aria-hidden="true"></i> View Blog</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
