@extends('app')
@section('title', 'Home')

@section('content')

    <section class="banner_main">
        <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="{{ asset('images/banner1.jpg') }}" width="100%" alt="First slide">
                    <div class="container">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="booking_ocline">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <div class="book_room">
                        <h1>Check Available Rooms</h1>
                        <form method="post" action="#">
                           @csrf
                           <div class="row">
                              <div class="col-md-12">
                                 <span>Arrival</span>
                                 <input class="form-control" type="date" min={{date('Y-m-d')}} name="start_date">
                              </div>
                              <div class="col-md-12">
                                 <span>Departure</span>
                                 <input class="form-control" type="date" min={{date('Y-m-d')}} name="end_date">
                              </div>
                              <div class="col-md-12 mt-4">
                                 <input type="submit" value="Check" class="btn btn-primary form-control">
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
        </div>

    </section>

@endsection
