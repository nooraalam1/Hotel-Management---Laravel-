<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="title">
            <h1 class="h5">{{ auth()->user()->name }}</h1>
            <p>Created: {{ auth()->user()->created_at }}</p>
        </div>
    </div>

    <ul class="list-unstyled">
        <li class=""><a href="{{ route('admin.dashboard') }}"> <i class="icon-home"></i>Home </a></li>
        <li>
            <a href="{{ route('home') }}"> <i class="icon-logout"></i>Home Page </a>
        </li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Rooms </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.addRoom') }}"> Add Room</a></li>
                <li><a href="{{ route('admin.view_rooms') }}">View Rooms</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.bookings') }}"> <i class="icon-logout"></i>Bookings </a>
        </li>
    </ul>
</nav>
