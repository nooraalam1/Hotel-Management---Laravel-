<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Room Details</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="#" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->

    @include('partials.header')
    <div class="d-flex justify-content-center align-items-center gap-10">
        <div class="our_room">
            <div class="container">
                <div class="row">
                    <div class="">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <figure><img src="{{ asset('storage/' . $room->image) }}" alt="#" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>{{ $room->room_title }}</h3>
                                <h5>Wifi : {{ $room->wifi }}</h5>
                                <h4>Type : {{ $room->room_type }}</h4>
                                <h2 style="color:rgb(255, 95, 2)">Price : {{ $room->price }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <form method="post">
                @csrf
                <div>
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" class="form-control">
                </div>
                <div>
                    <label>Start Date</label>
                    <input type="date" name="start_date" min="{{ date('Y-m-d') }}" class="form-control">
                </div>
                <div>
                    <label>End Date</label>
                    <input type="date" name="end_date" min="{{ date('Y-m-d') }}" class="form-control">
                </div>
                <div>
                    <input type="submit" value="Book Room" class="btn btn-primary form-control mt-4">
                </div>
            </form>
        </div>
    </div>

    @include('partials.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>

    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
