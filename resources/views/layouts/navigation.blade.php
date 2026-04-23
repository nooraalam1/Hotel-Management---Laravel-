<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-3">
            <!-- Settings Dropdown -->
            <div class="flex justify-between items-center">

                <div>
                    <h3 style="font-size:xx-large">{{ Auth::user()->name }}</h3>
                    <h3 >Created:{{ Auth::user()->created_at }}</h3>
                </div>

                <div class="flex justify-center items-center gap-2">
                    <div>
                        <a href="{{route('profile.edit')}}" class="btn btn-primary">Profile</a>
                    </div>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>