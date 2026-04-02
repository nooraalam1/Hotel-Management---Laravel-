<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="title">
            <h1 class="h5">{{ auth()->user()->name }}</h1>
            <p>Created: {{ auth()->user()->created_at }}</p>
        </div>
    </div>

    <ul class="list-unstyled">
        <li class=""><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard </a></li>
        <li>
            <a href="{{ route('home') }}"> <i class="fa fa-external-link-square" aria-hidden="true"></i>Go to Home Page </a>
        </li>
        <li><a href="#locationDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-map-marker" aria-hidden="true"></i>Locations </a>
            <ul id="locationDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.addRoom') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Location</a></li>
                <li><a href="{{ route('admin.view_rooms') }}"><i class="fa fa-eye" aria-hidden="true"></i>View Locations</a></li>
            </ul>
        </li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-bed" aria-hidden="true"></i>Rooms </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.addRoom') }}"> <i class="fa fa-plus-circle" aria-hidden="true"></i>Add Room</a></li>
                <li><a href="{{ route('admin.view_rooms') }}"><i class="fa fa-eye" aria-hidden="true"></i>View Rooms</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.bookings') }}"> <i class="icon-logout"></i>Booking Management </a>
        </li>
        <li><a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-picture-o" aria-hidden="true"></i>Image Management</a>
            <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.banner') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i>Banner</a></li>
                <li><a href="{{ route('admin.gallery') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i>Gallery</a></li>
            </ul>
        </li>
        <li><a href="#exampledropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book" aria-hidden="true"></i>Blog </a>
            <ul id="exampledropdownDropdown3" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.addblog') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Blog</a></li>
                <li><a href="{{ route('admin.viewblog') }}"><i class="fa fa-eye" aria-hidden="true"></i> View Blog</a></li>
            </ul>
        </li>
    </ul>
</nav>
